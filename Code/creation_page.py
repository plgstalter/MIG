import sqlite3

def det_sexe(secu):
    '''
    renvoie le sexe d'un individu sous forme de string en fonction du numéro de sécu
    '''
    n = int(str(secu)[0])
    if n == 1:
        return("Homme")
    elif n == 2:
        return("Femme")
    else:
        return("Non défini")

def enlever_quotes(donnees):
    res = []
    for donnee in donnees:
        if str(donnee)[0]=="'":
            res.append(donnee[1:len(donnee) - 1])
        else:
            res.append(donnee)
    return(tuple(res))



def patient(secu):
    # récupération des infos
    con = sqlite3.connect('../Ressources/Donnees/flowmed.db')
    cur = con.cursor()

    requete_sql = f'SELECT * FROM patients WHERE secu={secu}'

    cur.execute(requete_sql)
    con.commit()


    donnees = enlever_quotes(cur.fetchall()[0][1:]) # on récupère un tuple avec toutes les info du patient
    cur.close()
    con.close()

    nom, prenom, naissance, mdp, adresse, mail, numero = donnees

    source = open("../Ressources/squelette_patient.php", "r")
    squelette = source.read()
    source.close()

    fin = len(squelette)
    secu = str(secu)

    page = open(f'../Pages/{secu}.php', "w", encoding="utf-8")

    # on recopie le squelette jusqu'à tomber sur un symbole µ

    sexe = det_sexe(secu)
    pointeur = 0

    while True: # on lit le squelette, caractère par caractère
        # tant que l'on est pas dans une zone d'édition (délimitée par des µ), on recopie le squelette
        while (squelette[pointeur] != "µ") and (pointeur != fin - 1):
            page.write(squelette[pointeur])
            pointeur += 1
            if pointeur == fin:
                break
        # on est dans une zone d'édition
        # on sélectionone le premier caractère de l'entree demandé 
        entree = ""
        pointeur += 1
        
        if pointeur == fin:
                break

        while (squelette[pointeur] != "µ"):
            entree += squelette[pointeur]
            pointeur += 1
        
        # a ce stade, le pointeur pointe sur un symbole µ et on veut ajouter au fichier la variable entree
        try:
            page.write(eval(entree))
        except:
            page.write("null")
        pointeur += 1

        if pointeur == fin:
            break

    page.close()

def medecin(secu):
    # recupération des infos
    con = sqlite3.connect('../Ressources/Donnees/flowmed.db')
    cur = con.cursor()

    requete_sql = f'SELECT * FROM medecins WHERE secu={secu}'

    cur.execute(requete_sql)
    con.commit()

    donnees = enlever_quotes(cur.fetchall()[0][1:]) # on récupère un tuple avec toutes les info du patient
    cur.close()
    con.close()

    nom, prenom, mdp, adresse, numero, mail = donnees


    source = open("../Ressources/squelette_medecin.php", "r")
    squelette = source.read()
    source.close()

    fin = len(squelette)

    page = open("../Pages/med_" + nom + "." + prenom + ".php", "w", encoding="utf-8")

    # on recopie le squelette jusqu'à tomber sur un symbole µ

    pointeur = 0

    while True: # on lit le squelette, caractère par caractère
        # tant que l'on est pas dans une zone d'édition (délimitée par des µ), on recopie le squelette
        while (squelette[pointeur] != "µ") and (pointeur != fin - 1):
            page.write(squelette[pointeur])
            pointeur += 1
            if pointeur == fin:
                break
        # on est dans une zone d'édition
        # on sélectionone le premier caractère de l'entree demandé 
        entree = ""
        pointeur += 1
        
        if pointeur == fin:
                break

        while (squelette[pointeur] != "µ"):
            entree += squelette[pointeur]
            pointeur += 1
        
        # a ce stade, le pointeur pointe sur un symbole µ et on veut ajouter au fichier la variable entree
        try:
            page.write(eval(entree))
        except:
            page.write("null")
        pointeur += 1

        if pointeur == fin:
            break

    page.close()

def info(secu):
    # récupération des infos
    con = sqlite3.connect('../Ressources/Donnees/flowmed.db')
    cur = con.cursor()

    requete_sql = f'SELECT * FROM patients WHERE secu={secu}'

    cur.execute(requete_sql)
    con.commit()

    donnees = enlever_quotes(cur.fetchall()[0][1:]) # on récupère un tuple avec toutes les info du patient
    cur.close()
    con.close()

    nom, prenom, naissance, mdp, adresse, mail, numero = donnees

    source = open("../Ressources/squelette_info.php", "r")
    squelette = source.read()
    source.close()

    fin = len(squelette)

    page = open("../Pages/info." + nom + "." + prenom + ".php", "w", encoding="utf-8")

    # on recopie le squelette jusqu'à tomber sur un symbole µ


    pointeur = 0
    secu = str(secu)
    sexe = det_sexe(secu)

    while True: # on lit le squelette, caractère par caractère
        # tant que l'on est pas dans une zone d'édition (délimitée par des µ
        #), on recopie le squelette
        while (squelette[pointeur] != "µ") and (pointeur != fin - 1):
            page.write(squelette[pointeur])
            pointeur += 1
            if pointeur == fin:
                break
        # on est dans une zone d'édition
        # on sélectionone le premier caractère de l'entree demandé 
        entree = ""
        pointeur += 1
        
        if pointeur == fin:
                break

        while (squelette[pointeur] != "µ"):
            entree += squelette[pointeur]
            pointeur += 1
        
        # a ce stade, le pointeur pointe sur un symbole µ et on veut ajouter au fichier la variable entree
        try:
            page.write(eval(entree))
        except:
            page.write("null")
        pointeur += 1

        if pointeur == fin:
            break

    page.close()