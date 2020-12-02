import sqlite3, creation_page

# récupération des numéros de sécu

con = sqlite3.connect('../Ressources/Donnees/flowmed.db')
cur = con.cursor()

requete_patients = 'SELECT secu FROM patients;'
requete_medecins = 'SELECT secu FROM medecins;'

cur.execute(requete_patients)
patients = cur.fetchall()

cur.execute(requete_medecins)
medecins = cur.fetchall()

cur.close()
con.close()

for patient in patients:
    creation_page.patient(patient[0])
    creation_page.info(patient[0])

for medecin in medecins:
    creation_page.medecin(medecin[0])