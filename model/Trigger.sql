DELIMITER //
CREATE TRIGGER before_insert_joueur BEFORE INSERT
ON joueur FOR EACH ROW
BEGIN
IF NEW.nom_joueur in (select nom_joueur from joueur) and NEW.prenom_joueur in (select prenom_joueur from joueur) 
   and NEW.nom_equipe in (select nom_equipe from joueur)
	THEN
    SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Un joueur est déjà inscrit avec le même nom, le même prénom et le même nom_équipe. Si vous voulez inscrire cette personne veuillez inscrire un signe distinctif au nom des deux individus';
End if;
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER before_insert_horaire BEFORE INSERT
ON horaire FOR EACH ROW
BEGIN
IF NEW.heure_fin  < NEW.heure_debut        
      THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Vous avez saisi une date de début > à une date de fin. Veuillez recommencer svp.';    
    END IF;
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER before_insert_ramasseur BEFORE INSERT
ON ramasseur FOR EACH ROW
BEGIN
IF NEW.id_equipe_ramasseur IN (SELECT R.id_equipe_ramasseur
                      FROM ramasseur R
                      INNER JOIN equipe_ramasseur E 
					  ON E.id_equipe_ramasseur = R.id_equipe_ramasseur
                      GROUP BY E.id_equipe_ramasseur
                      HAVING COUNT(R.id_ramasseur) > 5)
  Then 
    	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Cette équipe est complète. Veuillez intégrer ce ramasseur dans une autre équipe';    
END IF;
END //
DELIMITER ;