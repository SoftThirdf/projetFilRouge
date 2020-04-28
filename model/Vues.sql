-- Vue détaillée des matchs en tournoi simple
CREATE VIEW vue_matchs_simples
AS SELECT DISTINCT R.id_Match, R.type_match, R.libelle_match, T.categorie_tournoi, T.type_tournoi, C.libelle_court, H.date_, SD.libelle_horaire, H.heure_debut, J1.nom_joueur AS nom_joueur1, J1.prenom_joueur AS prenom_joueur1, J1.nom_equipe AS nom_equipe1, J2.nom_joueur AS nom_joueur2, J2.prenom_joueur AS prenom_joueur2, J2.nom_equipe AS nom_equipe2
FROM rencontre R
INNER JOIN joueur J1 on R.id_joueur1 = J1.id_joueur OR R.id_joueur2 = J1.id_joueur
INNER JOIN joueur J2 on R.id_joueur1 = J2.id_joueur OR R.id_joueur2 = J2.id_joueur
INNER JOIN se_deroule2 SD ON SD.id_Match = R.id_Match
INNER JOIN court C ON C.id_court = R.id_court
INNER JOIN horaire H ON H.id_Horaire = SD.id_Horaire
INNER JOIN tournoi T ON T.id_tournoi = R.id_tournoi
WHERE J1.id_joueur < J2.id_joueur AND T.categorie_tournoi LIKE 'Simple';


-- Vue détaillée des matchs en tournoi double
CREATE VIEW vue_matchs_doubles
AS SELECT DISTINCT R.id_Match, R.type_match, R.libelle_match, T.categorie_tournoi, T.type_tournoi, C.libelle_court, H.date_, SD.libelle_horaire, H.heure_debut, J1.nom_equipe AS nom_equipe1, J1.nom_joueur AS nom_joueur1, J1.prenom_joueur AS prenom_joueur1, J2.nom_joueur AS nom_joueur2, J2.prenom_joueur AS prenom_joueur2, J3.nom_equipe AS nom_equipe2, J3.nom_joueur AS nom_joueur3, J3.prenom_joueur AS prenom_joueur3, J4.nom_joueur AS nom_joueur4, J4.prenom_joueur AS prenom_joueur4
FROM rencontre R
INNER JOIN joueur J1 on R.id_joueur1 = J1.id_joueur OR R.id_joueur2 = J1.id_joueur AND R.id_joueur3 = J1.id_joueur AND R.id_joueur4 = J1.id_joueur
INNER JOIN joueur J2 on R.id_joueur1 = J2.id_joueur OR R.id_joueur2 = J2.id_joueur
INNER JOIN joueur J3 on R.id_joueur3 = J3.id_joueur OR R.id_joueur3 = J3.id_joueur
INNER JOIN joueur J4 on R.id_joueur3 = J4.id_joueur OR R.id_joueur4 = J4.id_joueur
INNER JOIN se_deroule2 SD ON SD.id_Match = R.id_Match
INNER JOIN court C ON C.id_court = R.id_court
INNER JOIN horaire H ON H.id_Horaire = SD.id_Horaire INNER JOIN tournoi T ON T.id_tournoi = R.id_tournoi
WHERE J1.id_joueur < J2.id_joueur AND J3.id_joueur < J4.id_joueur AND T.categorie_tournoi LIKE 'Double';


-- Vue détaillée des joueurs
CREATE VIEW vue_details_joeuurs
AS SELECT J.id_joueur, J.nom_joueur, J.prenom_joueur, J.age_joueur, J.nationalite_joueur, J.nom_equipe, R.id_Match
FROM joueur J
INNER JOIN rencontre R ON R.id_joueur1 = J.id_joueur OR R.id_joueur2 = J.id_joueur OR R.id_joueur3 = J.id_joueur OR R.id_joueur4 = J.id_joueur
ORDER BY J.id_joueur;


-- Vue détaillée des VIP
CREATE VIEW vue_details_vip
AS SELECT V.nom_VIP, V.prenom_VIP, V.type_VIP, V.nationalite_VIP, V.nb_grands_chelems, V.classement_ATP_Simple, V.classement_ATP_Double, P.popularite_VIP
FROM vip V
INNER JOIN popularite P ON P.id_popularite = V.id_popularite
ORDER BY P.id_popularite DESC;
