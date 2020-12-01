import email, smtplib
from email import encoders
from email.mime.base import MIMEBase
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

def mail(nom, sexe, mail, statut, mdp):
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
    
    sender_email = "aug392020@gmail.com"
    receiver_email = mail
    password = "mdp"

    email = MIMEMultipart()
    email["From"] = sender_email
    email["To"] = receiver_email 
    email["Subject"] = subject

    email.attach(MIMEText(body, "plain"))

    session = smtplib.SMTP('smtp.gmail.com', 587) #use outlook with port
    session.starttls() #enable security
    session.login(sender_email, password) #login with mail_id and password
    text = email.as_string()
    session.sendmail(sender_email, receiver_email, text)
    session.quit()
