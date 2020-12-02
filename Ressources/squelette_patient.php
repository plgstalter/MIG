<DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="utf-8"/>
            <title>Espace Patient</title>
        </head>
        <body>
            <h1>FlowMed, le futur de la médecine</h1>
            <h2>Espace patient</h2>
            Beinvenue sur votre espace, µprenomµ !
    
            <div style="width:1000px;">
                <div style="width:300px; border: solid 1px #333333; float:left;">
                    <p>Mes questionnaires</p>
                    ...
                </div>
                <div style="width:300px; border: solid 1px #333333; float:right;">
                    µnomµ µprenomµ <br /> 
                    µmailµ <br />
                    <?php
                    $sexe = µsexeµ;
                    function phrase_naissance() {
                        global $sexe;
                        if ($sexe == "Homme") {
                            $chaine = 'Né le ';
                        }
                        elseif ($sexe == "Femme") {
                            $chaine = 'Née le ';
                        }
                        else {
                            $chaine = 'Né.e le ';
                        }
                        return $chaine;
                        
                    }
                    $chaine = phrase_naissance();
                    $date = µdateµ;
                    echo  $chaine, $date;
                    ?>
                </div>
              </div>
              <div style="clear: both;"></div>
        </body>
    </html>


