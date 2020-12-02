import sqlite3, sys, gestion_mdp

# deux arguments : mdp en premier, puis numéro de sécu

conn = sqlite3.connect('../Ressources/Donnees/flowmed.db')
cur = conn.cursor()

requete_sqlite = f"UPDATE patients SET mdp = {gestion_mdp.hacher(sys.argv[1])} WHERE secu = {sys.argv[2]}"

cur.execute(requete_sqlite)
conn.commit()

cur.close()
conn.close()
