# MIG Santé - projet de plateforme en ligne

En partant de l'application Covidom, on cherche à approfondir. Le travail est découpé en deux parties principales :

* un algorithme "apprenant" qui, en ayant accès aux données de Covidom, permettra de trier à l'avance les "fausses" alertes
* une plateforme élargie, sorte de hub permettant de traiter différentes pathologies

## Machine Learning

cf Auguste et Jean-Édouard

## "FlowMed"

Nom à changer, mais on le retiendra en attente de mieux.

L'idée est de créer une plateforme en ligne regroupant différentes pathologies. Les patients peuvent y entrer de deux façons principales :

* Test Covid positif
* avis de leur médecin traitant

### Développement

On a fait une plateforme codée en `html` et `PHP`. Les bases de données pour maintenir le tout en place sont en `sqlite3`. On utilise `Python` pour automatiser certains processus.

### Sécurité

Le site est à présent sécurisé : les mots de passe des utilisateurs sont hachés. Ainsi nous ne connaissons pas les mots de passe de nos membres, et sommes seulement en mesure de vérifier que le mot de passe entré est le bon.

De plus, l'accès aux pages est sécurisé : lorsque le site tourne sous `localhost`, on ne peut accéder à la page d'un patient/médecin que si on est connecté avec le bon `login`.