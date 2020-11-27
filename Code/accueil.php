<DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>FlowMed</title>
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
                    
                    <form action = "" method = "post">
                    Je suis ... <br />
                    <input type="checkbox" id="personne_1" name="personne_1" value="medecin">
                    <label for="personne_1"> médecin </label><br>
                    <input type="checkbox" id="personne_2" name="personne_2" value="patient">
                    <label for="personne_2"> patient </label><br>
                        <label>e-mail :      </label><input type = "text" name = "email" class = "box"/><br /><br />
                        <label>mot de passe :</label><input type = "password" name = "password" class = "box" /><br/><br />
                        <input type = "submit" value = " Submit "/><br />
                    </form>   
                    
                    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
                        
                </div>
                    
            </div>
                
            </div>
    </body>
</html>