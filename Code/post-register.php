<?php
session_start();
if (empty($_POST['personne'])){
    $_SESSION['erreur'] = 'Veuillez sélectionner médecin/patient';
    header('location: register.php');
}
elseif ($_REQUEST['mail'] == '') {
    $_SESSION['erreur'] = "Veuillez renseigner un email";
    header('location: register.php');
    exit;
}
$_SESSION['mail'] = "'".$_REQUEST['mail']."'";
$flowmed = new SQLite3('../Ressources/Donnees/flowmed.db');  // introduction de la base de données
$statement = $flowmed -> prepare("SELECT secu, mdp FROM :imaginary_table WHERE mail = :imaginary_mail");
$statement -> bindValue(':imaginary_table', $_POST['personne'].'s');
$statement -> bindValue(':imaginary_mail', $_SESSION['mail']);
$result = $statement -> execute();
if ($result == 0) {
    $_SESSION['erreur'] = 'mauvais login. Veuillez réessayer';
    header('location: register.php');
}
while ($row = $result->fetchArray()) {
    $_SESSION['secu'] = $row['secu'];
    $_SESSION['mdp'] = $row['mdp'];
    $url = '../Ressources/Pages/'.$_POST['personne'].'s'.$_SESSION['secu'].'.php';
}
if ($_REQUEST['mdp_2'] != $_REQUEST['mdp']) {
    $_SESSION['erreur'] = 'mot de passe différent';
    header('location: register.php');
}
$_SESSION['erreur'] = '';
$_SESSION['connecte'] = TRUE;
$command = escapeshellcmd('python python_php/ajout_mdp.py '.$_REQUEST['mdp'].' '.$_SESSION['secu']);
$output = shell_exec($command);
header('location: '.$url); // si on est bon, on envoie sur la page du patient
$flowmed = null; // on se sépare de la base de données à la fin de la page
?>