<DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="utf-8"/>
            <title>Espace Médecin</title>
            <link rel="stylesheet" href="../style.css">
        </head>
        <body>
            <h1>FlowMed, le futur de la médecine</h1>
            
            <div class="div1" style="height:350px">
            <h2>Espace médecin</h2>
                <p>
                    Bienvenue sur votre espace, Jean !
                </p>
                <div style="float:right">
                    <a href="../../Code/logout.php"> Déconnexion</a>
                </div>   
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <div style="width:1000px; background-color: rgb(255, 222, 209)">
                    <div class = "div3" style="float:left;">
                        <p> 
                            Les alertes de mes patients <br />
                            Aucune alerte non traitée à cet instant.
                        </p>
                    </div>
                    <div class = "div3" style="float:left; text-align:left; float:right;">
                        <p>
                            Bon de Paris Jean <br/>
                            12 rue du retard <br />
                            pierre-louis.gstalter@mines-paristech.fr <br />
                            0789415264 <br />
                        </p>
                    </div>
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <div class = "div3" style="float:left;">
                        <p> 
                            Mes patients <br />
                            <?php
                            $flowmed = new SQLite3('../Donnees/flowmed.db');  // introduction de la base de données
                            $statement = $flowmed -> prepare("SELECT nom, prenom FROM patients JOIN maladies ON patient = secu WHERE medecin = :imaginary_nom");
                            $statement -> bindValue(':imaginary_nom', 171564898754564);
                            $result = $statement -> execute();
                            while ($row = $result->fetchArray()) {
                                $nom = $row['nom'];
                                $prenom = $row['prenom'];
                                //echo '<a href="questionnaire'.$secu.'.php"> '.$nom.' '.$prenom.'</a><br />';
                                echo $nom.' '.$prenom.' <br />';
                            }
                            ?>
                        </p>
                    </div>
                </div>
        </div>
    </body>
    <?php
    $flowmed = null;
    ?>
</html