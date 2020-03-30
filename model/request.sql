-- Les noms et prénoms des joueurs ainsi que les sets mis ordonné par les numéro de macths lors d'un tournoi qualificatif simple
SELECT R.id_Match, J.Nom_joueur, J.Prenom_joueur, J.Nationalite_joueur, B.Nb_jeu, R.libelle_match
FROM Balle_set B
INNER JOIN rencontre R ON B.id_match = R.id_Match
INNER JOIN joueur J ON B.id_joueur = J.id_joueur
INNER JOIN tournoi T ON R.id_Tournoi = T.id_Tournoi
WHERE T.type_tournoi like 'Eliminatoire'
AND T.categorie_tournoi like 'Simple'
ORDER BY R.id_Match;

-- Les noms des équipes ainsi que les sets mis ordonné par les numéro de macths lors d'un tournoi qualificatif double
SELECT R.id_Match, J.nom_equipe, J.id_joueur, J.nom_joueur, J.prenom_joueur, J.Nationalite_joueur, R.libelle_match, B.Nb_jeu
FROM balle_set B
INNER JOIN rencontre R ON B.id_match = R.id_Match
INNER JOIN joueur J ON B.id_joueur = J.id_joueur
INNER JOIN tournoi T ON R.id_Tournoi = T.id_Tournoi WHERE T.type_tournoi like 'Eliminatoire'
AND T.categorie_tournoi like 'Double'
GROUP BY R.id_Match, J.id_joueur
