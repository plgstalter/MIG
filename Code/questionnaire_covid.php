<?php
session_start();
?>
<DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>Questionnaire</title>
        <?php
        $flowmed = new SQLite3('../Ressources/Donnees/flowmed.db');// introduction de la base de données
        ?>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>
            FlowMed, le futur de la médecine
            <img src="../Ressources/logo.png" height=80px align="left">
        </h1>
        <p>
            Bienvenue sur FlowMed ! Veuillez rentrer les informations relatives au questionnaire.
        </p>
        <div>
            <div style = "width:350px; border: solid 1px #333333; background-color: rgb(255, 222, 209);" align = "left">
                <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Questionnaire</b></div>
                    
                <div style = "margin:30px" align="right">
                    <form action = "post-questionnaire-covid.php" method = "post">
                    <label>frissons</label><input type="number" name="frisson_score" class="box"> <br /><br />
                    <label>fréquence respiratoire</label><input type="number" name="freq_respir_score" class="box"> <br /><br />
                    <label>malaise (oui/non)</label><input type="text" name="malaise_score" class="box"> <br /><br />
                    <label>fréquence cardiaque</label><input type="number" name="freq_card_score" class="box"> <br /><br />
                    <label>gêne respiratoire (oui/non)</label><input type="text" name="gene_respir_score" class="box"> <br /><br />
                    <label>température</label><input type="number" name="temperature_score" class="box"> <br /><br />
                    <label>saturation</label><input type="number" name="saturation_score" class="box"> <br /><br />
                    <label>nausée (oui/non)</label><input type="text" name="nausea_score" class="box"> <br /><br />
                    <input type = "submit" value = " Submit "/><br />
                    </form>   
                </div>
                    
            </div>
                
        </div>
    </body>
<?php 
$flowmed = null;
?>
</html>