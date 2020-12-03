<?php
session_start();
$_SESSION['compteur'] = 0; //compteur pour voir le nombre d'essais
// if ($_SESSION['compteur'] > 9) {
//     header("wrong.html");
// }
if ($_REQUEST['mail'] == '') {
    $_SESSION['error'] = "Veuillez renseigner un email";
    header('accueil.php');
    exit;
}
$_SESSION['mail'] = "'".$_REQUEST['mail']."'";
$flowmed = new SQLite3('../Ressources/Donnees/flowmed.db');  // introduction de la base de données
$statement = $flowmed -> prepare("SELECT secu, mdp FROM patients WHERE mail = :imaginary_word");
$statement -> bindValue(':imaginary_word', $_SESSION['mail']);
$result = $statement -> execute();
while ($row = $result->fetchArray()) {
    $_SESSION['secu'] = $row['secu'];
    $_SESSION['mdp'] = $row['mdp'];
    $url = '../Ressources/Pages/'.$_SESSION['secu'].'.php';
}
if ($_REQUEST['mdp'] == $_SESSION['mdp']) {
    $_SESSION['connecte'] = TRUE;
    header('location: '.$url); // si on est bon, on envoie sur la page du patient
}
else {
    $_SESSION['compteur']++;
    header("location: accueil.php"); // on réessaye de se connecter
}
$flowmed = null; // on se sépare de la base de données à la fin de la page
?>