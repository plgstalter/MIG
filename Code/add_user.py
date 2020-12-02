import sqlite3
import random as rd
import string
import envoi_mail
import creation_page

def mdp_rd(n = 12):
    mdp = ""
    letters = string.ascii_lowercase
    for i in range(n):
        # on choisit si l'on place un chiffre ou une lettre
        coin = rd.choice([True, False])
        if coin:
            mdp += rd.choice(letters)
        else:
            mdp += str(rd.randint(0,9))
    return mdp

def ajout_medecin(secu, nom, prenom, mdp, adresse, numero, mail):
    conn = sqlite3.connect('../Ressources/Donnees/flowmed.db')
    cur = conn.cursor()

    params = (secu, nom, prenom, mdp, "'" + adresse + "'", numero, "'" + mail + "'")

    sqlite_insert_query = "INSERT INTO medecins VALUES (?,?,?,?,?,?,?)"

    cur.execute(sqlite_insert_query, params)
    conn.commit()

    cur.close()
    conn.close()

    creation_page.medecin(secu)
    envoi_mail.mail(secu, "médecin")


def ajout_patient(secu, nom, prenom, naissance, adresse, mail, numero, mdp = mdp_rd()):
    '''
    ajoute un patient dans la bdd, par défaut, son compte n'est pas activé
    on lui attribue un mdp aléatoire
    '''

    conn = sqlite3.connect('../Ressources/Donnees/flowmed.db')
    cur = conn.cursor()
    secu = str(secu)

    params = (secu, nom, prenom, naissance, mdp, "'" + adresse + "'", "'" + mail + "'", numero)

    sqlite_insert_query = "INSERT INTO patients VALUES (?,?,?,?,?,?,?,?)"

    cur.execute(sqlite_insert_query, params)
    conn.commit()

    cur.close()
    conn.close()

    creation_page.patient(secu)
    envoi_mail.mail(secu, "patient")


