<?php
session_start();
if (empty($_POST['personne'])){
    $_SESSION['erreur'] = 'Veuillez sélectionner médecin/patient';
    header('location: accueil.php');
    exit;
}
elseif ($_REQUEST['mail'] == '') {
    $_SESSION['erreur'] = "Veuillez renseigner un email";
    header('location: accueil.php');
    exit;
}
$_SESSION['mail'] = "'".$_REQUEST['mail']."'";
$flowmed = new SQLite3('../Ressources/Donnees/flowmed.db');  // introduction de la base de données
if ($_POST['personne'] == 'patient') {
    $statement = $flowmed -> prepare("SELECT secu, mdp FROM patients WHERE mail = :imaginary_mail");
    $statement -> bindValue(':imaginary_mail', $_SESSION['mail']);
    $result = $statement -> execute();
}
elseif ($_POST['personne'] == 'medecin') {
    $statement = $flowmed -> prepare("SELECT secu, mdp FROM medecins WHERE mail = :imaginary_mail");
    $statement -> bindValue(':imaginary_mail', $_SESSION['mail']);
    $result = $statement -> execute();
}
if ($result == 0) {
    $_SESSION['erreur'] = 'mauvais login. Veuillez réessayer';
    header('location: accueil.php');
    exit;
}
while ($row = $result->fetchArray()) {
    $_SESSION['secu'] = $row['secu'];
    $_SESSION['mdp'] = $row['mdp'];
    $_SESSION['personne']=$_POST['personne'];
    $url = '../Ressources/Pages/'.$_POST['personne'].'.'.$_SESSION['secu'].'.php';
}
$command = escapeshellcmd('python hache_mdp.py '.$_REQUEST['mdp']); // on hache le mdp pour le comparer
$mdp_hache = shell_exec($command);
if (strcmp($mdp_hache, $_SESSION['mdp'])) {
    $_SESSION['erreur'] = '';
    $_SESSION['connecte'] = TRUE;
    header('location: '.$url); // si on est bon, on envoie sur la page du patient
    exit;
}
else {
    $_SESSION['erreur'] = 'mauvais login. Veuillez réessayer';
    header("location: accueil.php"); // on réessaye de se connecter
    exit;
}
$flowmed = null; // on se sépare de la base de données à la fin de la page
?>