-- Administrateur de la BDD
GRANT ALL
ON testdb.*
TO gestionnairebd@localhost;


-- Joueur
GRANT SELECT
ON testdb.joueur
TO joueurbd@localhost;
GRANT UPDATE (mdp)
ON testdb.joueur
TO joueurbd@localhost;
GRANT SELECT
ON testdb.joueur
TO joueurbd@localhost;
GRANT UPDATE (mdp)
ON testdb.joueur
TO joueurbd@localhost;
GRANT ALL
ON testdb.reservation
TO joueurbd@localhost;
GRANT ALL
ON testdb.horaire
TO joueurbd@localhost;
GRANT ALL
ON testdb.correspond2
TO joueurbd@localhost;
GRANT SELECT
ON testdb.rencontre
TO joueurbd@localhost;
GRANT SELECT
ON testdb.tournoi
TO joueurbd@localhost;
GRANT SELECT
ON testdb.court
TO joueurbd@localhost;
GRANT SELECT
ON testdb.vip
TO joueurbd@localhost;


-- Visiteur
GRANT SELECT (nom_joueur, prenom_joueur, nationalite_joueur, age_joueur, nom_equipe)
ON testdb.joueur
TO visiteurbd@localhost;
GRANT SELECT
ON testdb.vip
TO visiteurbd@localhost;
GRANT SELECT
ON testdb.rencontre
TO visiteurbd@localhost;
GRANT SELECT
ON testdb.tournoi
TO visiteurbd@localhost;
GRANT SELECT
ON testdb.horaire
TO visiteurbd@localhost;
GRANT SELECT
ON testdb.observe
TO visiteurbd@localhost;


-- Membre du comité
GRANT ALL
ON testdb.reservation
TO comitebd@localhost;
GRANT ALL
ON testdb.horaire
TO comitebd@localhost;
GRANT ALL
ON testdb.correspond2
TO comitebd@localhost;
GRANT SELECT
ON testdb.arbitre
TO comitebd@localhost;
GRANT SELECT
ON testdb.balle_set
TO comitebd@localhost;
GRANT SELECT
ON testdb.court
TO comitebd@localhost;
GRANT SELECT
ON testdb.equipe_ramasseur
TO comitebd@localhost;
GRANT SELECT
ON testdb.joueur
TO comitebd@localhost;
GRANT SELECT
ON testdb.observe
TO comitebd@localhost;
GRANT SELECT
ON testdb.popularite
TO comitebd@localhost;
GRANT SELECT
ON testdb.ramasseur
TO comitebd@localhost;
GRANT SELECT
ON testdb.rencontre
TO comitebd@localhost;
GRANT SELECT
ON testdb.se_deroule2
TO comitebd@localhost;
GRANT SELECT
ON testdb.tournoi
TO comitebd@localhost;
GRANT SELECT
ON testdb.vip
TO comitebd@localhost;
