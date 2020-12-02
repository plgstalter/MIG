<?php
$email = $_REQUEST['email'];
$p2 = $_REQUEST['password'];
$flowmed = new SQLite3('../Ressources/Donnees/flowmed.db');  // introduction de la base de données
// $result = $flowmed->QUERY('SELECT secu FROM patients WHERE mail ='.$email);
$statement = $flowmed -> prepare("SELECT secu FROM patients WHERE secu = :imaginary_word");
$statement -> bindValue(':imaginary_word', 598495);
$result = $statement -> execute();
while ($row = $result->fetchArray()) {
    $x = $row['secu'];
}
echo "<a href=../Pages/".$x.".php> votre session </a>";
?>