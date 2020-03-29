CREATE TABLE arbitre (
  id_arbitre SMALLINT PRIMARY KEY AUTO_INCREMENT,
  type_arbitre ENUM('Arbitre de chaise','Juge arbitre','Juge de ligne','Juge de fillet') NOT NULL,
  categorie_arbitre CHAR(4) NOT NULL,
  nom_arbitre VARCHAR(25) NOT NULL,
  prenom_arbitre VARCHAR(25) NOT NULL,
  nationalite_arbitre VARCHAR(25) NOT NULL,
  telephone_arbitre VARCHAR(15) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE court(
  id_Court SMALLINT PRIMARY KEY AUTO_INCREMENT,
  libelle_court VARCHAR(15) NOT NULL,
  type_court VARCHAR(12) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE horaire(
  id_Horaire SMALLINT PRIMARY KEY AUTO_INCREMENT,
  heure_debut TIME NOT NULL,
  date_ DATE NOT NULL,
  heure_fin TIME
)ENGINE=InnoDB;

CREATE TABLE equipe_ramasseur (
  id_equipe_ramasseur SMALLINT PRIMARY KEY AUTO_INCREMENT,
  nom_equipe_ramasseur VARCHAR(15) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE tournoi (
  id_Tournoi SMALLINT PRIMARY KEY AUTO_INCREMENT,
  type_tournoi VARCHAR(12) NOT NULL,
  categorie_tournoi CHAR(6) NOT NULL,
  id_arbitre1 SMALLINT NOT NULL,
  id_arbitre2 SMALLINT NOT NULL,
  id_arbitre3 SMALLINT NOT NULL,
  id_arbitre4 SMALLINT NOT NULL,
  id_arbitre5 SMALLINT NOT NULL,
  id_arbitre6 SMALLINT NOT NULL,
  id_arbitre7 SMALLINT NOT NULL,
  id_arbitre8 SMALLINT NOT NULL,
  id_arbitre9 SMALLINT NOT NULL,
  id_arbitre10 SMALLINT NOT NULL,
  id_arbitre11 SMALLINT NOT NULL,
  id_arbitre12 SMALLINT NOT NULL,
  id_arbitre13 SMALLINT NOT NULL,
  id_arbitre14 SMALLINT NOT NULL,
  id_arbitre15 SMALLINT NOT NULL,
  id_arbitre16 SMALLINT NOT NULL,
  id_arbitre17 SMALLINT NOT NULL,
  id_arbitre18 SMALLINT NOT NULL,
  id_arbitre19 SMALLINT NOT NULL,
  id_arbitre20 SMALLINT NOT NULL,
  id_arbitre21 SMALLINT NOT NULL,
  id_arbitre22 SMALLINT NOT NULL,
  id_arbitre23 SMALLINT NOT NULL,
  id_arbitre24 SMALLINT NOT NULL,
  id_arbitre25 SMALLINT NOT NULL,
  id_arbitre26 SMALLINT NOT NULL,
  id_arbitre27 SMALLINT NOT NULL,
  id_arbitre28 SMALLINT NOT NULL,
  id_arbitre29 SMALLINT NOT NULL,
  id_arbitre30 SMALLINT NOT NULL,
  id_arbitre31 SMALLINT NOT NULL,
  id_arbitre32 SMALLINT NOT NULL,
  id_arbitre33 SMALLINT NOT NULL,
  id_arbitre34 SMALLINT NOT NULL,
  id_arbitre35 SMALLINT NOT NULL,
  id_arbitre36 SMALLINT NOT NULL,
  id_arbitre37 SMALLINT NOT NULL,
  id_arbitre38 SMALLINT NOT NULL,
  id_arbitre39 SMALLINT NOT NULL,
  id_arbitre40 SMALLINT NOT NULL,
  id_arbitre41 SMALLINT NOT NULL,
  id_arbitre42 SMALLINT NOT NULL,
  id_arbitre43 SMALLINT NOT NULL,
  id_arbitre44 SMALLINT NOT NULL,
  id_arbitre45 SMALLINT NOT NULL,
  id_arbitre46 SMALLINT NOT NULL,
  FOREIGN KEY (id_arbitre1) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre2) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre3) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre4) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre5) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre6) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre7) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre8) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre9) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre10) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre11) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre12) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre13) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre14) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre15) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre16) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre17) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre18) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre19) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre20) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre21) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre22) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre23) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre24) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre25) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre26) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre27) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre28) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre29) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre30) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre31) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre32) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre33) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre34) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre35) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre36) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre37) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre38) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre39) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre40) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre41) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre42) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre43) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre44) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre45) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre46) REFERENCES ARBITRE (id_arbitre)
)ENGINE=InnoDB;

CREATE TABLE popularite (
  id_Popularite SMALLINT PRIMARY KEY AUTO_INCREMENT,
  popularite_VIP VARCHAR(15) NOT NULL,
  nb_followers_instagram_Min INT NOT NULL,
  nb_followers_instagram_Max INT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE ramasseur (
  id_ramasseur SMALLINT PRIMARY KEY AUTO_INCREMENT,
  nom_ramasseur VARCHAR(25) NOT NULL,
  prenom_ramasseur VARCHAR(25) NOT NULL,
  telephone_ramasseur VARCHAR(15) NOT NULL,
  id_equipe_ramasseur SMALLINT,
  FOREIGN KEY (id_equipe_ramasseur) REFERENCES EQUIPE_RAMASSEUR (id_equipe_ramasseur)
)ENGINE=InnoDB;

CREATE TABLE joueur (
  id_joueur SMALLINT PRIMARY KEY AUTO_INCREMENT,
  nom_joueur VARCHAR(25) NOT NULL,
  prenom_joueur VARCHAR(25) NOT NULL,
  nationalite_joueur VARCHAR(25) NOT NULL,
  age_joueur TINYINT NOT NULL,
  nom_equipe VARCHAR(20) NOT NULL,
  login VARCHAR(10) NOT NULL,
  mdp VARCHAR(20) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE reservation(
  id_Reservation SMALLINT PRIMARY KEY AUTO_INCREMENT,
  id_Court SMALLINT NOT NULL,
  id_Joueur SMALLINT NOT NULL,
  FOREIGN KEY (id_Court) REFERENCES COURT(id_Court),
  FOREIGN KEY (id_Joueur) REFERENCES JOUEUR(id_Joueur)
)ENGINE=InnoDB;

CREATE TABLE correspond2(
  id_Reservation SMALLINT PRIMARY KEY AUTO_INCREMENT,
  id_Horaire SMALLINT NOT NULL,
  FOREIGN KEY(id_Reservation) REFERENCES RESERVATION(id_Reservation),
  FOREIGN KEY(id_Horaire)REFERENCES HORAIRE(id_Horaire)
)ENGINE=InnoDB;

CREATE TABLE vip (
  id_VIP SMALLINT PRIMARY KEY AUTO_INCREMENT,
  prenom_VIP VARCHAR(25) NOT NULL,
  nom_VIP VARCHAR(25) NOT NULL,
  type_VIP VARCHAR(15) NOT NULL,
  nationalite_VIP VARCHAR(25) NOT NULL,
  nb_grands_chelems TINYINT NOT NULL,
  classement_ATP_Simple VARCHAR(6) NOT NULL,
  classement_ATP_Double VARCHAR(7) NOT NULL,
  id_Popularite SMALLINT NOT NULL,
  FOREIGN KEY (id_Popularite) REFERENCES POPULARITE (id_Popularite)
)ENGINE=InnoDB;

CREATE TABLE rencontre (
  id_Match SMALLINT PRIMARY KEY AUTO_INCREMENT,
  type_match VARCHAR(12) NOT NULL,
  nom_equipe_gagnant VARCHAR(30) DEFAULT NULL,
  libelle_match VARCHAR(25) NOT NULL,
  id_Court SMALLINT NOT NULL,
  id_Tournoi SMALLINT NOT NULL,
  id_joueur1 SMALLINT NOT NULL,
  id_joueur2 SMALLINT NOT NULL,
  id_joueur3 SMALLINT,
  id_joueur4 SMALLINT,
  id_equipe_ramasseur1 SMALLINT NOT NULL,
  id_equipe_ramasseur2 SMALLINT NOT NULL,
  id_arbitre1 SMALLINT NOT NULL,
  id_arbitre2 SMALLINT NOT NULL,
  id_arbitre3 SMALLINT NOT NULL,
  id_arbitre4 SMALLINT NOT NULL,
  id_arbitre5 SMALLINT NOT NULL,
  id_arbitre6 SMALLINT NOT NULL,
  id_arbitre7 SMALLINT NOT NULL,
  id_arbitre8 SMALLINT NOT NULL,
  id_arbitre9 SMALLINT NOT NULL,
  id_arbitre10 SMALLINT NOT NULL,
  FOREIGN KEY (id_Court) REFERENCES COURT (id_Court),
  FOREIGN KEY (id_Tournoi) REFERENCES TOURNOI (id_Tournoi),
  FOREIGN KEY (id_joueur1) REFERENCES JOUEUR (id_joueur),
  FOREIGN KEY (id_joueur2) REFERENCES JOUEUR (id_joueur),
  FOREIGN KEY (id_joueur3) REFERENCES JOUEUR (id_joueur),
  FOREIGN KEY (id_joueur4) REFERENCES JOUEUR (id_joueur),
  FOREIGN KEY (id_equipe_ramasseur1) REFERENCES EQUIPE_RAMASSEUR (id_equipe_ramasseur),
  FOREIGN KEY (id_equipe_ramasseur2) REFERENCES EQUIPE_RAMASSEUR (id_equipe_ramasseur),
  FOREIGN KEY (id_arbitre1) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre2) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre3) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre4) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre5) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre6) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre7) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre8) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre9) REFERENCES ARBITRE (id_arbitre),
  FOREIGN KEY (id_arbitre10) REFERENCES ARBITRE (id_arbitre)
)ENGINE=InnoDB;

CREATE TABLE balle_Set (
  id_set SMALLINT PRIMARY KEY AUTO_INCREMENT,
  nb_jeu TINYINT NOT NULL,
  duree_set TINYINT NOT NULL,
  id_Match SMALLINT,
  id_joueur SMALLINT,
  FOREIGN KEY (id_Match) REFERENCES RENCONTRE (id_Match),
  FOREIGN KEY (id_joueur) REFERENCES JOUEUR (id_joueur)
)ENGINE=InnoDB;

CREATE TABLE se_deroule2(
  id_Match SMALLINT PRIMARY KEY AUTO_INCREMENT,
  id_Horaire SMALLINT NOT NULL,
  libelle_horaire ENUM('Matin', 'Midi', 'Soirée') NOT NULL,
  FOREIGN KEY (id_Match) REFERENCES RENCONTRE(id_Match),
  FOREIGN KEY (id_Horaire) REFERENCES HORAIRE(id_Horaire)
)ENGINE=InnoDB;

CREATE TABLE observe (
  id_Match SMALLINT PRIMARY KEY AUTO_INCREMENT,
  id_VIP SMALLINT NOT NULL,
  FOREIGN KEY (id_Match) REFERENCES RENCONTRE (id_Match),
  FOREIGN KEY (id_VIP) REFERENCES VIP (id_VIP)
)ENGINE=InnoDB;
