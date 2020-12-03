# Diagrammes d'état

Ce diagramme a pour objectif de montrer les différents états dans lequel le patient peut se trouver.
Il montre également les relations entre ces états.

## Hypothèses simplificatrices

- si un patient est effectivement positif à la Covid, le résultat de son test sera positif dans 100% des cas.
- si un patient est effectivement négatif à la Covid, le résultat de son test sera négatif dans 100% des cas.
- pas de patients asymptomatiques : lorsqu'un patient est positif, il a des symptômes, le médecin généraliste
	l'inscrit donc sur la plateforme pour la Covid dans 100% des cas (puis l'envoie faire un test).
- le délai d'obtention du résultat du test pour la Covid est de 2 unités de temps.
- le délai de guérison pour la covid, compté à partir du moment où le patient commence le suivi, est de 5 unités de temps.
	Donc le temps de suivi du patient ne dépend pas du stade de la maladie auquel il a commencé ce suivi.

- un patient atteint de diabète est redirigé vers un spécialiste (par le généraliste) puis diagnostiqué positif au diabète 
	(par le spécialiste) dans 100% des cas.
- le délai d'obtention du résultat du test pour le diabète est nul.
- le délai de guérison pour le diabète est infini.

- lorsqu'un patient consulte, il consulte soit pour le diabète, soit pour la Covid, soit pour les 2.
- lorsqu'un patient consulte pour une maladie, le généraliste le redirige forcément vers la plateforme
	(dans le cas de la Covid) ou vers un spécialiste (dans le cas du diabète).


## Variables

Elles fonctionnent comme des booléens : 1 = vrai ; 0 = faux.

Variables d'entrées (inputs): ce sont les variables que l'on choisit avant de lancer la simulation.
covid_pos : le patient est effectivement positif à la Covid.
diab_pos : le patient fait du diabète.
i_covid : le patient est déjà inscrit sur la plateforme pour un suivi de la Covid.
i_diab : le patient est déjà inscrit sur la plateforme pour un suivi du diabète.
consult_covid : le patient choisit d'aller consulter pour la Covid.
consult_diab : le patient choisit d'aller consulter pour le diabète.

Variables locales: Les valeurs de ces variables changent au cours de la simultation.
inscrit_covid : vaut i_covid à l'initialisation puis indique si le patient est inscrit sur la plateforme pour un suivi de la Covid ou non.
inscrit_diab : vaut i_diab à l'initialisation puis indique si le patient est inscrit sur la plateforme pour un suivi du diabète ou non.
test_covid : le patient est testé positif à la Covid.
test_diab : le patient est testé positif au diabète.
fin : permet de mettre fin à la simulation lorsque le patient a atteint un état stable.

## Constantes

d : délai d'obtention du test pour la Covid = 2 unités de temps
guerison : délai de guérison pour la covid, compté à partir du moment où le patient commence le suivi = 5 unités de temps.