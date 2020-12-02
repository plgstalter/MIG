import sqlite3

flowmed = sqlite3.connect('flowmed.db')

cur = flowmed.cursor()

def ex(query):
    cur.execute(query)

ex('CREATE TABLE maladies (maladie TEXT, patient INT, medecin INT);')
cur.close()
flowmed.close()
# je fais la base patient

