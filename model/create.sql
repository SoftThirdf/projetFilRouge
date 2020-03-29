CREATE TABLE court(
  id_Court CHAR(4) PRIMARY KEY,
  libelle_court VARCHAR(15) NOT NULL,
  type_court VARCHAR(12) NOT NULL,
  libre ENUM('Libre', 'Occupé')
);

CREATE TABLE horaire(
  id_Horaire VARCHAR(2) PRIMARY KEY,
  heure_debut TIME NOT NULL,
  date_ DATE NOT NULL,
  heure_fin TIME ,
  libelle_horaire ENUM('Matin', 'Midi', 'Soirée')
);

CREATE TABLE equipe (
  id_equipe char(5) PRIMARY KEY,
  nom_equipe VARCHAR(15) NOT NULL
);

CREATE TABLE balle_Set (
  id_set CHAR(6) PRIMARY KEY
);

CREATE TABLE equipe_ramasseur (
  id_equipe_ramasseur CHAR(5) PRIMARY KEY,
  nom_equipe_ramasseur VARCHAR(15) NOT NULL
);

CREATE TABLE ramasseur (
  id_ramasseur CHAR(4) PRIMARY KEY,
  nom_ramasseur VARCHAR(25) NOT NULL,
  prenom_ramasseur VARCHAR(25) NOT NULL,
  telephone_ramasseur VARCHAR(15) NOT NULL,
  id_equipe_ramasseur CHAR(5) NOT NULL,
  FOREIGN KEY (id_equipe_ramasseur) REFERENCES EQUIPE_RAMASSEUR (id_equipe_ramasseur)
);

CREATE TABLE joueur (
  id_joueur CHAR(4) PRIMARY KEY,
  nom_joueur VARCHAR(25) NOT NULL,
  prenom_joueur VARCHAR(25) NOT NULL,
  nationalite_joueur VARCHAR(25) NOT NULL,
  age_joueur TINYINT NOT NULL,
  id_equipe CHAR(5) NOT NULL,
  FOREIGN KEY (id_equipe) REFERENCES EQUIPE (id_equipe)
);

CREATE TABLE reservation(
  id_Reservation CHAR(7) PRIMARY KEY,
  id_Court CHAR(4) NOT NULL,
  id_Joueur CHAR(4) NOT NULL,
  FOREIGN KEY (id_Court) REFERENCES COURT(id_Court),
  FOREIGN KEY (id_Joueur) REFERENCES JOUEUR(id_Joueur)
);

CREATE TABLE correspond2(
  id_Reservation CHAR(7) NOT NULL,
  id_Horaire VARCHAR(2) NOT NULL,
  FOREIGN KEY(id_Reservation) REFERENCES RESERVATION(id_Reservation),
  FOREIGN KEY(id_Horaire)REFERENCES HORAIRE(id_Horaire)
);


CREATE TABLE tournoi (
  id_Tournoi CHAR(3) PRIMARY KEY,
  type_tournoi VARCHAR(12) NOT NULL,
  categorie_tournoi CHAR(6) NOT NULL
);

CREATE TABLE popularite (
  id_Popularite CHAR(5) PRIMARY KEY,
  popularite_VIP VARCHAR(15) NOT NULL,
  nb_followers_instagram_Min INT NOT NULL,
  nb_followers_instagram_Max INT NOT NULL
);

CREATE TABLE vip (
  id_VIP CHAR(6) PRIMARY KEY,
  prenom_VIP VARCHAR(25) NOT NULL,
  nom_VIP VARCHAR(25) NOT NULL,
  type_VIP VARCHAR(15) NOT NULL,
  nationalite_VIP VARCHAR(25) NOT NULL,
  nb_grands_chelems TINYINT NOT NULL,
  classement_ATP_Simple VARCHAR(6) NOT NULL,
  classement_ATP_Double VARCHAR(7) NOT NULL,
  id_Popularite CHAR(5) NOT NULL,
  FOREIGN KEY (id_Popularite) REFERENCES POPULARITE (id_Popularite)
);

CREATE TABLE arbitre (
  id_arbitre CHAR(4) PRIMARY KEY,
  type_arbitre ENUM('Arbitre de chaise','Juge arbitre','Juge de ligne','Juge de fillet') NOT NULL,
  categorie_arbitre CHAR(4) NOT NULL,
  nom_arbitre VARCHAR(25) NOT NULL,
  prenom_arbitre VARCHAR(25) NOT NULL,
  nationalite_arbitre VARCHAR(25) NOT NULL,
  telephone_arbitre VARCHAR(15) NOT NULL
);

CREATE TABLE rencontre (
  id_Match CHAR(5) PRIMARY KEY,
  type_match VARCHAR(12) NOT NULL,
  nom_equipe_gagnant VARCHAR(30) ,
  libelle_match VARCHAR(25) NOT NULL,
  id_Court CHAR(4) NOT NULL,
  id_Tournoi CHAR(3) NOT NULL,
  id_Arbitre CHAR(4) NOT NULL,
  id_Equipe_Ramasseur CHAR(5) NOT NULL,
  FOREIGN KEY (id_Court) REFERENCES COURT (id_Court),
  FOREIGN KEY (id_Tournoi) REFERENCES TOURNOI (id_Tournoi),
  FOREIGN KEY (id_Arbitre) REFERENCES ARBITRE (id_Arbitre),
  FOREIGN KEY (id_Equipe_Ramasseur) REFERENCES EQUIPE_RAMASSEUR (id_Equipe_Ramasseur)
);

CREATE TABLE se_deroule2(
  id_Match CHAR(5) NOT NULL,
  id_Horaire VARCHAR(2) NOT NULL,
  libelle_horaire ENUM('Matin', 'Midi', 'Soirée') NOT NULL,
  FOREIGN KEY (id_Match) REFERENCES RENCONTRE(id_Match),
  FOREIGN KEY (id_Horaire) REFERENCES HORAIRE(id_Horaire)
);

CREATE TABLE observe (
  id_Match CHAR(5) NOT NULL,
  id_VIP CHAR(6) NOT NULL,
  FOREIGN KEY (id_Match) REFERENCES RENCONTRE (id_Match),
  FOREIGN KEY (id_VIP) REFERENCES VIP (id_VIP)
);

CREATE TABLE marque (
  id_match CHAR(5) NOT NULL,
  id_set CHAR(6) NOT NULL,
  id_joueur CHAR(4) NOT NULL,
  nb_jeu_simple TINYINT NOT NULL,
  FOREIGN KEY (id_Match) REFERENCES RENCONTRE (id_Match),
  FOREIGN KEY (id_set) REFERENCES BALLE_SET (id_set),
  FOREIGN KEY (id_joueur) REFERENCES JOUEUR (id_joueur)
);
