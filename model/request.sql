-- Les noms et prénoms des joueurs ainsi que les sets mis ordonné par les numéro de macths lors d'un tournoi qualificatif simple
SELECT R.id_Match, J.Nom_joueur, J.Prenom_joueur, J.Nationalite_joueur, M.Nb_jeu_simple
FROM Marque M
INNER JOIN rencontre R ON M.id_match = R.id_Match
INNER JOIN joueur J ON M.id_joueur = J.id_joueur
INNER JOIN tournoi T ON R.id_Tournoi = T.id_Tournoi
WHERE T.type_tournoi like 'Eliminatoire'
AND T.categorie_tournoi like 'Simple'
ORDER BY R.id_Match;
