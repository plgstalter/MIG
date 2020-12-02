<DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>FlowMed</title>
        <?php
        $flowmed = new SQLite3('../Ressources/Donnes/flowmed.db');// introduction de la base de données
        ?>
    </head>
    <body>
        <h1>
            FlowMed, le futur de la médecine
        </h1>
        <p>
            Bienvenue sur FlowMed ! Pour accéder à la plateforme en ligne, veuillez vous identifier.
        </p>
        <div>
            <div style = "width:350px; border: solid 1px #333333; " align = "left">
                <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
                    
                <div style = "margin:30px">
                    <form action = "post-method.php" method = "post">
                    <!-- Je suis ... 
                    <input type="checkbox" name="personne[]" value="medecin">
                    <label for="personne_1"> médecin </label>
                    <input type="checkbox" name="personne[]" value="patient">
                    <label for="personne_2"> patient </label><br> -->
                    <label>e-mail :      </label><input type = "text" name = "email" class = "box"/><br /><br />
                    <label>mot de passe :</label><input type = "password" name = "password" class = "box" /><br/><br />
                    <input type = "submit" value = " Submit "/><br />
                    </form>   
                    
                        
                </div>
                    
            </div>
                
            </div>
    </body>
    <?php
    $flowmed = null; // on se sépare de la base de données à la fin
    ?>
</html>