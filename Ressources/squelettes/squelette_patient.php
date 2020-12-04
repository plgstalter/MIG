
<DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="utf-8"/>
            <title>Espace Patient</title>
            <link rel="stylesheet" href="../style.css">
        </head>
        <body>
            <h1>FlowMed, le futur de la médecine</h1>
            
            <div class="div1" style="height:350px">
                <div style="float:left">
                    <h2>Espace patient</h2>
                    <p>Bienvenue sur votre espace, µprenomµ !</p>
                </div>
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <div style="float:right">
                    <a href="../../Code/logout.php"> Déconnexion</a>
                </div>        
                <br />
                <div style="width:1000px; border:1px; background-color: rgb(255, 222, 209); background-position: center;">
                    <div class = "div3" style="text-align:left;float:right">
                        <p>
                        µnomµ µprenomµ <br /> 
                        µmailµ <br />
                        <?php
                        $sexe = 'µsexeµ';
                        $date = 'µnaissanceµ';
                        if ($sexe == "Homme") {
                            $chaine = 'Né le ';
                        }
                        elseif ($sexe == "Femme") {
                            $chaine = 'Née le ';
                        }
                        else {
                            $chaine = 'Né.e le ';
                        }
                        echo $chaine, $date;
                        ?>
                        </p>
                    </div>
                    <div class = "div3" style="float:left;">
                        <p>
                            <a href="../../Code/questionnaire_covid.php">Mes questionnaires</a>
                        </p>
                        <p>
                            <a href="">Mon suivi</a>
                        </p>
                        <p>
                            <a href="">Mes informations personnelles</a>
                        </p> 
                </div>
                </div>
            </div>
        </body>
    </html>