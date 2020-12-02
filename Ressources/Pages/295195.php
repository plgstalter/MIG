
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
                <div style="float:left">
                    <h2>Espace patient</h2>
                    <p>Bienvenue sur votre espace, Nathalie !</p>
                </div>
                <div style="float:right">
                    <a href="../../Code/logout.php"> Déconnexion</a>
                </div>
        
                <br />
                <div style="width:1000px; border:1px; background-color: rgb(255, 222, 209); background-position: center;">
                    <div class = "div3" style="float:left;">
                        <p>
                            <a href="">Mes questionnaires</a>
                        </p>
                    </div>
                    <div class = "div3" style="text-align:left;float:right">
                        <p>
                        Durand Nathalie <br /> 
                        pierre-louis.gstalter@mines-paristech.fr <br />
                        <?php
                        $sexe = 'Femme';
                        $date = '15/02/2012';
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
    </html