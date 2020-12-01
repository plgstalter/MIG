def det_sexe(secu):
    '''
    renvoie le sexe d'un individu sous forme de string en fonction du numéro de sécu
    '''
    n = int(secu[0])
    if n == 1:
        return("Homme")
    elif n == 2:
        return("Femme")
    else:
        return("Non défini")


def patient(nom = "Durand", prenom = "Nathalie", date = "01/01/1992", mail = "nathalie.durand@orange.fr", mdp = "null", secu = "218998", photo = "null"):
    
    source = open("../Ressources/squelette_patient.php", "r")
    squelette = source.read()
    source.close()

    fin = len(squelette)
    secu = str(secu)

    page = open("../Pages/" + secu + ".php", "w", encoding="utf-8")

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
        # on sélectionone le premier caractère de l'input demandé 
        input = ""
        pointeur += 1
        
        if pointeur == fin:
                break

        while (squelette[pointeur] != "µ"):
            input += squelette[pointeur]
            pointeur += 1
        
        # a ce stade, le pointeur pointe sur un symbole µ et on veut ajouter au fichier la variable input
        try:
            page.write(eval(input))
        except:
            page.write("null")
        pointeur += 1

        if pointeur == fin:
            break

    page.close()

def medecin(nom = "Dupont",prenom = "Michel", adresse = "12 rue des lilas", mail = "michel.dupont@yahoo.fr", numero = "0678124568"):
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
        # on sélectionone le premier caractère de l'input demandé 
        input = ""
        pointeur += 1
        
        if pointeur == fin:
                break

        while (squelette[pointeur] != "µ"):
            input += squelette[pointeur]
            pointeur += 1
        
        # a ce stade, le pointeur pointe sur un symbole µ et on veut ajouter au fichier la variable input
        try:
            page.write(eval(input))
        except:
            page.write("null")
        pointeur += 1

        if pointeur == fin:
            break

    page.close()

def info(prenom, nom, mail, numero, adresse, naissance, secu):
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
        # on sélectionone le premier caractère de l'input demandé 
        input = ""
        pointeur += 1
        
        if pointeur == fin:
                break

        while (squelette[pointeur] != "µ"):
            input += squelette[pointeur]
            pointeur += 1
        
        # a ce stade, le pointeur pointe sur un symbole µ et on veut ajouter au fichier la variable input
        try:
            page.write(eval(input))
        except:
            page.write("null")
        pointeur += 1

        if pointeur == fin:
            break

    page.close()

