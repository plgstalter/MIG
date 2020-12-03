<?php
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$flowmed = new SQLite3('../Ressources/Donnees/flowmed.db');  // introduction de la base de données
$statement = $flowmed -> prepare("SELECT secu, mdp FROM patients WHERE mail = :imaginary_word");
$statement -> bindValue(':imaginary_word', $email);
$result = $statement -> execute();
while ($row = $result->fetchArray()) {
    $secu = $row['secu'];
    $mdp = $row['mdp'];
}

if ($mdp == $password) {
    session_start();
    $statement_2 = $flowmed -> prepare("SELECT * FROM patients WHERE secu = :imaginary_word");
    $statement_2 -> bindValue(':imaginary_word', $secu);
    $result_2 = $statement_2 -> execute();
    while ($row = $result_2->fetchArray()) {
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $naissance = $row['naissance'];
        $adresse = $row['adresse'];
}
else {
    header("wrong.php");
}
?>

<DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>Espace Patient</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>FlowMed, le futur de la médecine</h1>
        
        <div class="div1" style="height:350px">
            <h2>Espace patient</h2>
            <?php
            echo "<p>Bienvenue sur votre espace, ".$prenom." !</p>";
            ?>
    
            <br />
            <div style="width:1000px; border:1px; background-color:lightblue; background-position: center;">
                <div class = "div3" style="float:left;">
                    <p>
                        <a href="">Mes questionnaires</a>
                    </p>
                </div>
                <div class = "div3" style="text-align:left;float:right">
                    <p>
                    <?php
                    echo $nom, $prenom." <br />"; 
                    echo $email." <br />";
                    echo "Né le : ".$naissance." <br />";
                    ?>
                    </p>
                </div>
                <br />
                <br />
                <br />
                <br />
                <div class = "div3" style="float:left;">
                    <p>
                        <a href="">Mon suivi</a>
                    </p>
                </div>
                <br />
                <br />
                <br />
                <br />
                <div class = "div3" style=" float:left;">
                    <p>
                        <a href="">Mes informations personnelles</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>