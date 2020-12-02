import email, smtplib, sqlite3, creation_page
from email import encoders
from email.mime.base import MIMEBase
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

def mail(secu, statut):
    if statut == "médecin":
        # recupération des infos
        con = sqlite3.connect('../Ressources/Donnees/flowmed.db')
        cur = con.cursor()

        requete_sql = f'SELECT * FROM medecins WHERE secu={secu}'

        cur.execute(requete_sql)
        con.commit()

        donnees = creation_page.enlever_quotes(cur.fetchall()[0][1:]) # on récupère un tuple avec toutes les info du patient
        cur.close()
        con.close()
        nom, prenom, mdp, adresse, numero, mail = donnees
    else: # on suppose que c un patient
        # récupération des infos
        con = sqlite3.connect('../Ressources/Donnees/flowmed.db')
        cur = con.cursor()

        requete_sql = f'SELECT * FROM patients WHERE secu={secu}'

        cur.execute(requete_sql)
        con.commit()

        donnees = creation_page.enlever_quotes(cur.fetchall()[0][1:]) # on récupère un tuple avec toutes les info du patient
        cur.close()
        con.close()

        nom, prenom, naissance, mdp, adresse, mail, numero = donnees
    
    sexe = creation_page.det_sexe(secu)
    if sexe == "Homme":
        politesse = "Monsieur"
    elif sexe == "Femme":
        politesse = "Madame"
    else:
        politesse = "Individu non-genré"
    
    if statut == "médecin":
        politesse = "Dr."
    
    subject = f"Ouverture d'un compte {statut} sur la plateforme FlowMed"

    body = f"""{politesse} {nom},
                un compte {statut} a été ouvert à votre nom sur la plateforme FlowMed
                avec le mot de passe suivant : {mdp}.
                
                Pour confirmer votre compte, connectez-vous à la plateforme avec 
                ce mot de passe que vous serez alors en mesure de changer.
                
                FlowMed, le Boeing de la médecine."""
    


    try:
        sender_email = "flowflowmed@gmail.com"
        receiver_email = mail
        password = "3bGCn2t9YjC7"

        email = MIMEMultipart()
        email["From"] = sender_email
        email["To"] = receiver_email 
        email["Subject"] = subject

        email.attach(MIMEText(body, "plain"))

        session = smtplib.SMTP('smtp.gmail.com', 587) #use mail with port
        session.starttls() #enable security
        session.login(sender_email, password) #login with mail_id and password
        text = email.as_string()
        session.sendmail(sender_email, receiver_email, text)
        session.quit()
    except:
        try:
            print('adresse backup 1')
            sender_email = "flowmed.nepasrepondre@mail.fr"
            receiver_email = mail
            password = "rewusg4cUZSqDklSqDd1"

            email = MIMEMultipart()
            email["From"] = sender_email
            email["To"] = receiver_email 
            email["Subject"] = subject

            email.attach(MIMEText(body, "plain"))

            session = smtplib.SMTP('smtp.mail.fr', 587) #use mail with port
            session.starttls() #enable security
            session.login(sender_email, password) #login with mail_id and password
            text = email.as_string()
            session.sendmail(sender_email, receiver_email, text)
            session.quit()
        except:
            try:
                print('adresse backup 2')
                sender_email = "flowmed_backup@mail.fr"
                receiver_email = mail
                password = "Exf6oGIooKLBOy8wzt0H"

                email = MIMEMultipart()
                email["From"] = sender_email
                email["To"] = receiver_email 
                email["Subject"] = subject

                email.attach(MIMEText(body, "plain"))

                session = smtplib.SMTP('smtp.mail.fr', 587) #use mail with port
                session.starttls() #enable security
                session.login(sender_email, password) #login with mail_id and password
                text = email.as_string()
                session.sendmail(sender_email, receiver_email, text)
                session.quit()
            except:
                print('mail non envoyé')