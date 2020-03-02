-- INSERTION EQUIPE
INSERT INTO EQUIPE_RAMASSEUR VALUES ('ES001','Team1');
INSERT INTO EQUIPE_RAMASSEUR VALUES ('ES002','Team2');
INSERT INTO EQUIPE_RAMASSEUR VALUES ('ES003','Team3');
INSERT INTO EQUIPE_RAMASSEUR VALUES ('ES005','Team4');
INSERT INTO EQUIPE_RAMASSEUR VALUES ('ES006','Team5');
INSERT INTO EQUIPE_RAMASSEUR VALUES ('ES007','Team6');

-- INSERTION DE JOUEURS
INSERT INTO JOUEUR VALUES('J001','Cantin','Aubrey','FR','19','ES001');
INSERT INTO JOUEUR VALUES('J002','Carter','Joshua','US','24','ES002');
INSERT INTO JOUEUR VALUES('J003','Gibbons','Nicholas','GB','22','ES003');
INSERT INTO JOUEUR VALUES('J004','Grave','Timothy','AUS','28','ES004');
INSERT INTO JOUEUR VALUES('J005','Mendoza','Tiago','ES','31','ES005');
INSERT INTO JOUEUR VALUES('J006','Hegediš','Rrahman','SI','35','ES006');

-- INSERTION DE SETS
INSERT INTO BALLE_SET VALUES('SET001');
INSERT INTO BALLE_SET VALUES('SET002');
INSERT INTO BALLE_SET VALUES('SET003');
INSERT INTO BALLE_SET VALUES('SET004');
INSERT INTO BALLE_SET VALUES('SET005');
INSERT INTO BALLE_SET VALUES('SET006');
INSERT INTO BALLE_SET VALUES('SET007');
INSERT INTO BALLE_SET VALUES('SET008');
INSERT INTO BALLE_SET VALUES('SET009');
INSERT INTO BALLE_SET VALUES('SET010');
INSERT INTO BALLE_SET VALUES('SET011');
INSERT INTO BALLE_SET VALUES('SET012');
INSERT INTO BALLE_SET VALUES('SET013');
INSERT INTO BALLE_SET VALUES('SET014');

-- INSERTION D'EQUIPES DE RAMASSEURS
INSERT INTO EQUIPE_RAMASSEUR VALUES ('ER001','TeamRam1');

-- INSERTION DE RAMASSEURS
INSERT INTO RAMASSEUR VALUES ('R001','Baril','Thibault','06.02.00.00.01','ER001');
INSERT INTO RAMASSEUR VALUES ('R002','Bousquet','Seymour','06.02.00.00.02','ER001');
INSERT INTO RAMASSEUR VALUES ('R003','Legget ','Gervais','06.02.00.00.03','ER001');
INSERT INTO RAMASSEUR VALUES ('R004','Bouvier','Daniel','06.02.00.00.04','ER001');
INSERT INTO RAMASSEUR VALUES ('R005','Faubert','Tearlach ','06.02.00.00.05','ER001');
INSERT INTO RAMASSEUR VALUES ('R006','Joseph ','Lazure','06.02.00.00.06','ER001');

-- INSERTION D'ARBITRES
INSERT INTO ARBITRE VALUES ('A001','Arbitre de chaise','ITT1','Dupont','Jean','FR','06.01.00.00.01');

-- INSERTION DE TOURNOIS
INSERT INTO TOURNOI VALUES ('TQ1','Eliminatoire','Simple');

-- INSERTION DE COURTS
INSERT INTO COURT VALUES ('CO01','Officiel 1','officiel','Occupé');
INSERT INTO COURT VALUES ('CE01','Entrainement 1','Entraînement','Occupé');

-- INSERTION DE RENCONTRES
INSERT INTO RENCONTRE VALUES ('SQ001','Tournoi',null,'1/8','CO01','TQ1','A001','ER001');
INSERT INTO RENCONTRE VALUES ('SQ002','Tournoi',null,'1/8','CE01','TQ1','A001','ER001');
INSERT INTO RENCONTRE VALUES ('SQ003','Tournoi',null,'1/8','CE01','TQ1','A001','ER001');

-- INSERTION DE MARQUE
INSERT INTO MARQUE VALUES ('SQ001','SET001','J001','6');
INSERT INTO MARQUE VALUES ('SQ001','SET002','J002','4');
INSERT INTO MARQUE VALUES ('SQ001','SET003','J001','3');
INSERT INTO MARQUE VALUES ('SQ001','SET004','J002','6');
INSERT INTO MARQUE VALUES ('SQ001','SET005','J001','7');
INSERT INTO MARQUE VALUES ('SQ001','SET006','J001','5');

INSERT INTO MARQUE VALUES ('SQ002','SET007','J003','2');
INSERT INTO MARQUE VALUES ('SQ002','SET008','J004','6');
INSERT INTO MARQUE VALUES ('SQ002','SET009','J003','6');
INSERT INTO MARQUE VALUES ('SQ002','SET010','J004','2');
INSERT INTO MARQUE VALUES ('SQ002','SET011','J004','5');
INSERT INTO MARQUE VALUES ('SQ002','SET012','J003','6');

INSERT INTO MARQUE VALUES ('SQ003','SET013','J005','0');
INSERT INTO MARQUE VALUES ('SQ003','SET014','J006','0');
