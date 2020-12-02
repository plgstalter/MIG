import sqlite3, sys
from datetime import date

# en arguments, dans cet ordre : maladie (str), secu_patient (int), secu_medecin (int)

maladie, patient, medecin = sys.argv[1], sys.argv[2], sys.argv[3]
today = date.today().strftime("%d/%m/%Y")

conn = sqlite3.connect("../Ressources/Donnees/flowmed.db")
cur = conn.cursor()

sql = "INSERT INTO maladies VALUES (?,?,?,?)"
params = (maladie, patient, medecin, today)

cur.execute(sql, params)
conn.commit()
cur.close()
conn.close()



