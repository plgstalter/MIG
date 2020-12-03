<DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>FlowMed</title>
        <link rel="stylesheet"  href="style.css">
        <?php
        $flowmed = new SQLite3('../Ressources/Donnees/flowmed.db');// introduction de la base de données
        ?>
    </head>
    <body>
        <h1>
            FlowMed, le futur de la médecine
            <img src="../Ressources/logo.png" height=80px align="left">
        </h1>
        <p>
            Bienvenue sur FlowMed ! Pour vous inscrire, entrez votre email et créez un mot de passe.
        </p>
        <div>
            <div style = "width:400px; border: solid 1px #333333; background-color: rgb(255, 222, 209); " align = "left">
                <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Register</b></div>
                    
                <div style = "margin:30px" align="right">
                    <?php
                    if (isset($_SESSION['compteur'])) {
                        echo "Erreur dans vos entrées. Veuillez réessayer. <br />";
                    }
                    ?>
                    <form action = "post-register.php" method = "post">
                    <label>e-mail :      </label><input type = "text" name = "mail" class = "box"/><br /><br />
                    <label>mot de passe :</label><input type = "password" name = "mdp" class = "box" /><br/><br />
                    <label>confirmer le mot de passe :</label><input type = "password" name = "mdp" class = "box" /><br/><br />
                    <input type = "submit" value = " Submit "/><br />
                    </form>    
                </div>
                    
            </div>
                
        </div>
    </body>