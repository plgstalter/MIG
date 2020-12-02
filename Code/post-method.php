<?php
include session;
$_SESSION['compteur'] = 0; //compteur pour voir le nombre d'essais
// if ($_SESSION['compteur'] > 9) {
//     header("wrong.html");
// }
if ($_REQUEST['mail'] == '') {

}
$_SESSION['mail'] = $_REQUEST['mail'];

$mdp = $_REQUEST['mdp'];
$flowmed = new SQLite3('../Ressources/Donnees/flowmed.db');  // introduction de la base de données
$statement = $flowmed -> prepare("SELECT secu, mdp FROM patients WHERE mail = :imaginary_word");
$statement -> bindValue(':imaginary_word', $email);
$result = $statement -> execute();
while ($row = $result->fetchArray()) {
    $_SESSION['secu'] = $row['secu'];
    $_SESSION['mdp'] = $row['mdp'];
}

if ($mdp == $_SESSION['mdp']) {
    $_SESSION['connecte'] = TRUE;
    $statement_2 = $flowmed -> prepare("SELECT * FROM patients WHERE secu = :imaginary_word");
    $statement_2 -> bindValue(':imaginary_word', $secu);
    $result_2 = $statement_2 -> execute();
    while ($row = $result_2->fetchArray()) {
        // $_SESSION['nom'] = $row['nom'];
        // $_SESSION['prenom'] = $row['prenom'];
        // $_SESSION['naissance'] = $row['naissance'];
        // $_SESSION['adresse'] = $row['adresse'];
    header("location: ../Pages/".$_SESSION['secu'].".php"); // si on est bon, on envoie sur la page du patient
}
else {
    header("accueil.php"); // on réessaye de se connecter
    $_SESSION['compteur']++;
}
$flowmed = null; // on se sépare de la base de données à la fin de la page
?>