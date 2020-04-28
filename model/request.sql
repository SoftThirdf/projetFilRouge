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
ORDER BY R.id_Match, J.id_joueur

-- Renvoie l'utilisateur et ses informations correspondant aux login et mdp renseignés
SELECT j.nom_joueur, j.prenom_joueur, j.id_joueur,j.nom_equipe,j.nationalite_joueur, j.login, j.mdp
FROM joueur j
WHERE j.login= \"$Login\"
AND j.mdp= \"$Mdp\"

-- Renvoi tout les tournois en cours
SELECT T.id_Tournoi, T.type_tournoi, T.categorie_tournoi
FROM Tournoi T

-- Met à jour le mot de passe d'un utilisateur
UPDATE joueur j SET j.mdp = \"$nouveaumdp\" WHERE j.login like \"$Login\"

-- Renvoi tout les courts et leurs infos
SELECT id_Court, libelle_court FROM Court

-- Renvoi tout les joueurs
SELECT id_joueur, nom_joueur, prenom_joueur FROM Joueur

-- Renvoi tout les arbitres
SELECT id_arbitre, nom_arbitre, prenom_arbitre FROM Arbitre

-- Renvoi toutes les équipes de ramasseurs de balles
Select * FROM equipe_ramasseur

-- Renvoi toutes les équipes de ramasseurs de balles sans prendre en compte l'équipe de ramasseur de balle passé en paramètre
Select *
FROM equipe_ramasseur
WHERE id_equipe_ramasseur
NOT IN(
  SELECT id_equipe_ramasseur
  FROM equipe_ramasseur
  WHERE id_equipe_ramasseur = $idErb)

-- Renvoi tout les joueurs sans prendre en compte le joueur passé en paramètre
SELECT id_joueur, nom_joueur, prenom_joueur
FROM Joueur
WHERE id_joueur
NOT IN(
  SELECT id_joueur
  FROM Joueur
  WHERE id_joueur = $idJoueur)

-- Renvoi tout les joueurs sans prendre en compte les joueurs passés en paramètre
SELECT id_joueur, nom_joueur, prenom_joueur
FROM Joueur
WHERE id_joueur
NOT IN(
  SELECT id_joueur
  FROM Joueur
  WHERE id_joueur = $idJoueur1
  OR id_joueur = $idJoueur2)

-- Renvoi tout les joueurs sans prendre en compte les joueurs passés en paramètre
SELECT id_joueur, nom_joueur, prenom_joueur
FROM Joueur
WHERE id_joueur
NOT IN(
  SELECT id_joueur
  FROM Joueur
  WHERE id_joueur = $idJoueur1
  OR id_joueur = $idJoueur2
  OR id_joueur = $idJoueur3)

-- Insère une rencontre dans la base de donnée
INSERT INTO RENCONTRE(type_match,nom_equipe_gagnant,libelle_match,id_Court,id_Tournoi,id_joueur1,id_joueur2,id_joueur3,id_joueur4,id_equipe_ramasseur1,id_equipe_ramasseur2,id_arbitre1,id_arbitre2,id_arbitre3,id_arbitre4,id_arbitre5,id_arbitre6,id_arbitre7,id_arbitre8,id_arbitre9,id_arbitre10)
VALUES (:type_match,:nomGagnant,:libelle_match,:idCourt,:id_Tournoi,:idJoueur1,:idJoueur2,:idJoueur3,:idJoueur4,:idErb1,:idErb2,:idArbitre1,:idArbitre2,:idArbitre3,:idArbitre4,:idArbitre5,:idArbitre6,:idArbitre7,:idArbitre8,:idArbitre9,:idArbitre10)

-- Insère un arbitre dans la base de donnée
INSERT INTO ARBITRE(type_arbitre,categorie_arbitre,nom_arbitre,prenom_arbitre,nationalite_arbitre,telephone_arbitre) VALUES(:type_arbitre,:categorie_arbitre,:nom_arbitre,:prenom_arbitre,:nationalite_arbitre,:telephone_arbitre)

-- Insère un joueur dans la base de donnée
INSERT INTO JOUEUR (nom_joueur,prenom_joueur,nationalite_joueur,age_joueur,nom_equipe,login,mdp) VALUES(:nom_joueur,:prenom_joueur,:nationalite_joueur,:age_joueur,:nom_equipe,:login,:mdp)

-- Renvoi tout les matchs double en cours avec les informations des matchs (qui ne sont pas terminés)
SELECT r.id_Match,j.id_joueur as 'id_j1', j.nom_joueur as 'nom_j1', j.prenom_joueur as 'prenom_j1',
j2.id_joueur as 'id_j2',j2.nom_joueur as 'nom_j2', j2.prenom_joueur as 'prenom_j2',j3.id_joueur as 'id_j3', j3.nom_joueur as 'nom_j3', j3.prenom_joueur as 'prenom_j3',j4.id_joueur as 'id_j4', j4.nom_joueur as 'nom_j4', j4.prenom_joueur as 'prenom_j4'
FROM rencontre r
INNER JOIN se_deroule2 se ON se.id_Match = r.id_Match
INNER JOIN horaire h ON h.id_Horaire = se.id_Horaire
INNER JOIN joueur j ON j.id_joueur = r.id_joueur1
INNER JOIN joueur j2 ON j2.id_joueur = r.id_joueur2
INNER JOIN joueur j3 ON j3.id_joueur = r.id_joueur3
INNER JOIN joueur j4 ON j4.id_joueur = r.id_joueur4
INNER JOIN tournoi t ON t.id_Tournoi = r.id_Tournoi
WHERE h.heure_fin IS NULL
AND t.categorie_tournoi like 'Double'
AND r.nom_equipe_gagnant IS NULL
AND r.id_joueur2 IN (SELECT id_joueur FROM joueur)
AND r.id_joueur3 IN (SELECT id_joueur FROM joueur)
AND r.id_joueur4 IN (SELECT id_joueur FROM joueur)

-- Renvoi tout les matchs simple en cours (qui ne sont pas terminés)
SELECT r.id_Match,j.id_joueur as 'id_j1',j.nom_joueur as 'nom_j1', j.prenom_joueur as 'prenom_j1',j2.id_joueur as 'id_j2',j2.nom_joueur as 'nom_j2', j2.prenom_joueur as 'prenom_j2'
FROM rencontre r
INNER JOIN se_deroule2 se ON se.id_Match = r.id_Match
INNER JOIN horaire h ON h.id_Horaire = se.id_Horaire
INNER JOIN joueur j ON j.id_joueur = r.id_joueur1
INNER JOIN joueur j2 ON j2.id_joueur = r.id_joueur2
INNER JOIN tournoi t ON t.id_Tournoi = r.id_Tournoi
WHERE h.heure_fin IS NULL
AND t.categorie_tournoi like 'Simple'
AND r.nom_equipe_gagnant IS NULL
AND r.id_joueur2 IN (SELECT id_joueur FROM joueur)

-- Renvoi tout les sets d'un match en cours passé en paramètre
SELECT b.num_set,j.nom_equipe, j.nom_joueur, j.prenom_joueur, b.nb_jeu
FROM balle_set b
INNER JOIN joueur j ON j.id_joueur = b.id_joueur
WHERE b.id_match = $idMatch
ORDER BY b.num_set, j.nom_equipe

-- Renvoi le dernier id du set d'un joueur lors d'un match avec le nombre de jeu et le numéro du set
SELECT b.id_set, b.nb_jeu, b.num_set
  FROM balle_set b
  INNER JOIN joueur j ON j.id_joueur = b.id_joueur
  WHERE b.id_match = $id_match
  AND j.id_joueur = $id_joueur
  ORDER BY b.id_set DESC
  LIMIT 1

-- Met à jour dans la base de donnée un set marqué par un joueur
UPDATE BALLE_SET SET nb_jeu=:jeu WHERE id_Match=:id_match AND id_joueur=:id_joueur AND id_set=:idset AND num_set=:num_set

SELECT b.id_set, b.nb_jeu, b.num_set
FROM balle_set b
INNER JOIN joueur j ON j.id_joueur = b.id_joueur
WHERE b.id_match = $id_match
AND j.id_joueur = $id_joueur
ORDER BY b.id_set DESC
LIMIT 1

-- Renvoi le dernier numéro de set joué lors d'un match, avec les id des joueurs
SELECT r.id_Match, r.id_joueur1, r.id_joueur2, r.id_joueur3, r.id_joueur4, b.num_set
FROM rencontre r
LEFT OUTER JOIN balle_set b ON b.id_Match = r.id_Match
WHERE r.id_match = $id_match
ORDER BY b.num_set DESC
LIMIT 1

-- Insère dans la base de donnée les set pour chaque joueurs
INSERT INTO BALLE_SET (nb_jeu,duree_set,id_Match,id_joueur,num_set) VALUES(:jeu,:duree,:id_match,:id_joueur1,:num_set);
INSERT INTO BALLE_SET (nb_jeu,duree_set,id_Match,id_joueur,num_set) VALUES(:jeu,:duree,:id_match,:id_joueur2,:num_set);
INSERT INTO BALLE_SET (nb_jeu,duree_set,id_Match,id_joueur,num_set) VALUES(:jeu,:duree,:id_match,:id_joueur3,:num_set);
INSERT INTO BALLE_SET (nb_jeu,duree_set,id_Match,id_joueur,num_set) VALUES(:jeu,:duree,:id_match,:id_joueur4,:num_set);

-- Renvoi le nombre de jeu marqué par les équipes lors d'un matchs et lors d'un set
SELECT b.num_set,j.nom_equipe, SUM(b.nb_jeu) as 'nb_jeu'
FROM balle_set b
INNER JOIN joueur j ON j.id_joueur = b.id_joueur
WHERE b.id_Match = $id_match
GROUP BY b.num_set,j.nom_equipe

-- Met à jour le gagnant d'un match
UPDATE RENCONTRE SET nom_equipe_gagnant=:nom_equipe_gagnant WHERE id_Match=:id_match

-- Retourne les informations d'un VIP suivant l'id passé en paramètre
SELECT V.id_VIP, V.nom_VIP, V.prenom_VIP, P.popularite_VIP, V.type_VIP, V.nationalite_VIP, V.nb_grands_chelems, V.classement_ATP_simple, V.classement_ATP_double
FROM vip V, popularite P
WHERE V.id_popularite = P.id_popularite
AND V.id_VIP = $idVIP

-- Retourne toutes les informations de tout les VIP
SELECT V.id_VIP, V.nom_VIP, V.prenom_VIP, P.popularite_VIP
FROM vip V, popularite P
WHERE V.id_Popularite = P.id_Popularite
ORDER BY P.id_popularite DESC

-- Retourne les informations des vip passés en paramètres
SELECT V.id_VIP, V.nom_VIP, V.prenom_VIP, P.popularite_VIP, V.type_VIP, V.nationalite_VIP, V.nb_grands_chelems, V.classement_ATP_simple, V.classement_ATP_double
FROM vip V, popularite P
WHERE V.id_popularite = P.id_popularite
AND V.nom_VIP LIKE \"$nomVIP1\"
AND V.prenom_VIP LIKE \"$prenomVIP1\"

UNION
SELECT V.id_VIP, V.nom_VIP, V.prenom_VIP, P.popularite_VIP, V.type_VIP, V.nationalite_VIP, V.nb_grands_chelems, V.classement_ATP_simple, V.classement_ATP_double
FROM vip V, popularite P
WHERE V.id_popularite = P.id_popularite
AND V.nom_VIP LIKE \"$nomVIP2\"
AND V.prenom_VIP LIKE \"$prenomVIP2\"

UNION
SELECT V.id_VIP, V.nom_VIP, V.prenom_VIP, P.popularite_VIP, V.type_VIP, V.nationalite_VIP, V.nb_grands_chelems, V.classement_ATP_simple, V.classement_ATP_double
FROM vip V, popularite P
WHERE V.id_popularite = P.id_popularite
AND V.nom_VIP LIKE \"$nomVIP3\"
AND V.prenom_VIP LIKE \"$prenomVIP3\"

-- Renvoi toutes les réservations d'un joueur
SELECT r.id_reservation, c.libelle_court, h.date_, h.heure_debut, h.heure_fin
FROM reservation r
INNER JOIN joueur j ON j.id_joueur = r.id_Joueur
INNER JOIN correspond2 co ON co.id_Reservation = r.id_Reservation
INNER JOIN horaire h ON h.id_Horaire = co.id_Horaire
INNER JOIN court c ON r.id_Court = c.id_Court
WHERE j.id_joueur = $idJoueur

-- Renvoi tous les courts non utilisés lors des horaires renseignés
SELECT c.id_Court, c.libelle_court
FROM court c
WHERE c.id_Court NOT IN (
   SELECT r.id_Court
   FROM reservation r
   INNER JOIN correspond2 co ON co.id_Reservation = r.id_Reservation
   INNER JOIN horaire h ON h.id_Horaire = co.id_Horaire
   WHERE date_ = \"$date\"
   AND heure_debut >= \"$heure_debut\"
   AND heure_fin <= \"$heure_fin\")
AND c.id_Court NOT IN (
   SELECT re.id_Court
   FROM rencontre re
   INNER JOIN se_deroule2 se ON se.id_Match = re.id_Match
   INNER JOIN horaire h ON h.id_Horaire = se.id_Horaire
   WHERE date_ = \"$date\"
   AND heure_debut >= \"$heure_debut\"
   AND heure_fin <= \"$heure_fin\")

-- Renvoi les dates et heures des plages où le joueurs n'est pas disponible
SELECT h.date_, h.heure_debut
FROM horaire h
INNER JOIN se_deroule2 se ON se.id_Horaire = h.id_Horaire
INNER JOIN rencontre r ON r.id_Match = se.id_Match
WHERE r.id_joueur1 = $idJoueur
OR r.id_joueur2 = $idJoueur
OR r.id_joueur3 = $idJoueur
OR r.id_joueur4 = $idJoueur

UNION

SELECT h.date_, h.heure_debut
FROM horaire h
INNER JOIN correspond2 c ON c.id_Horaire = h.id_Horaire
INNER JOIN reservation re ON re.id_Reservation = c.id_Reservation
WHERE re.id_Joueur = $idJoueur

-- Insère une réservation
INSERT INTO RESERVATION (id_Court, id_joueur) VALUES (:court, :id_joueur)

-- Insère un horaires
INSERT INTO HORAIRE(heure_debut,date_,heure_fin) VALUES (:heure_debut,:dateR,:heure_fin)

-- Renvoi le dernier id horaire à une date et des heures données
 SELECT h.id_Horaire
 FROM horaire h
 WHERE h.heure_debut = \"$heure_debut\"
 AND h.date_ = \"$date\"
 AND h.heure_fin = \"$heure_fin\"
 ORDER BY h.id_Horaire DESC
 LIMIT 1

 -- Renvoi le dernier id réservation faite par un joueur et sur un court donné
 SELECT r.id_Reservation
 FROM reservation r
 WHERE r.id_Court=$court
 AND r.id_Joueur = $idJoueur
 ORDER BY r.id_Reservation DESC
 LIMIT 1

 -- Insère dans la tbale correspond2 les informations pour une réservation à un horaire
 INSERT INTO CORRESPOND2(id_Reservation, id_Horaire) VALUES (:id_Reservation, :id_Horaire)
