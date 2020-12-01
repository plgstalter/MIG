import sqlite3
import creation_page

def ajout_medecin(secu, nom, prenom, mdp, adresse, numero, mail):
    conn = sqlite3.connect('../Ressources/Donnees/flowmed.db')
    cur = conn.cursor()

    params = (secu, nom, prenom, mdp, "'" + adresse + "'", numero, "'" + mail + "'")

    sqlite_insert_query = "INSERT INTO medecins VALUES (?,?,?,?,?,?,?)"

    cur.execute(sqlite_insert_query, params)
    conn.commit()

    cur.close()
    conn.close()

    creation_page.medecin(nom, prenom, adresse, mail, numero)


def ajout_patient(secu, nom, prenom, naissance, mdp, adresse, mail, numero):
    '''
    ajoute un patient dans la bdd, par défaut, son compte n'est pas activé
    '''

    conn = sqlite3.connect('../Ressources/Donnees/flowmed.db')
    cur = conn.cursor()

    params = (secu, nom, prenom, naissance, mdp, "'" + adresse + "'", "'" + mail + "'", numero)

    sqlite_insert_query = "INSERT INTO medecins VALUES (?,?,?,?,?,?,?,?)"

    cur.execute(sqlite_insert_query, params)
    conn.commit()

    cur.close()
    conn.close()

    creation_page.patient(nom, prenom, naissance, mail, mdp, secu)