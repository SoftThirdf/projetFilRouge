-- Index sur les noms et prénoms des joueurs (3 index)
-- Index sur les noms
CREATE FULLTEXT INDEX index_joueur_nom
ON joueur (nom_joueur);

-- Index sur les prénoms
CREATE FULLTEXT INDEX index_joueur_prenom
ON joueur (prenom_joueur);

-- Index sur les noms et les prénoms
CREATE FULLTEXT INDEX index_joueur_nom_prenom
ON joueur (nom_joueur, prenom_joueur);


-- Index sur les noms et prénoms des ramasseurs
CREATE FULLTEXT INDEX index_ramasseur_nom_prenom
ON ramasseur (nom_ramasseur, prenom_ramasseur);


-- Index sur les noms et prénoms des VIP
CREATE FULLTEXT INDEX index_vip_nom_prenom
ON vip (nom_vip, prenom_vip);


-- Index sur les noms et prénoms des arbitres
CREATE FULLTEXT INDEX Index_arbitre_nom_prenom
ON arbitre (nom_arbitre, prenom_arbitre);


-- Index sur les login des joueurs
CREATE UNIQUE INDEX index_joueur_login
ON joueur (login);
