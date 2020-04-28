DELIMITER |
CREATE PROCEDURE afficher_joueur_selon_match_et_horaire(IN
j_id_joueur smallint)
BEGIN
    SELECT R.id_match, S.id_Horaire,H.date_, H.heure_debut
	from rencontre R
	inner join se_deroule2 S
	On S.id_Match = R.id_Match
    inner join horaire H
    on H.id_Horaire = S.id_Horaire
	where id_joueur1 = j_id_joueur
    UNION
    SELECT R.id_match, S.id_Horaire,H.date_, H.heure_debut
	from rencontre R
	inner join se_deroule2 S
	On S.id_Match = R.id_Match
    inner join horaire H
    on H.id_Horaire = S.id_Horaire
	where id_joueur2 = j_id_joueur
    UNION
    SELECT R.id_match, S.id_Horaire,H.date_, H.heure_debut
	from rencontre R
	inner join se_deroule2 S
	On S.id_Match = R.id_Match
    inner join horaire H
    on H.id_Horaire = S.id_Horaire
	where id_joueur3 = j_id_joueur
    UNION
    SELECT R.id_match, S.id_Horaire,H.date_, H.heure_debut
	from rencontre R
	inner join se_deroule2 S
	On S.id_Match = R.id_Match
    inner join horaire H
    on H.id_Horaire = S.id_Horaire
	where id_joueur4 = j_id_joueur;
END |
DELIMITER ;



DELIMITER |
CREATE PROCEDURE afficher_equipe_ramasseur_non_plein (IN r_id_equipe_ramasseur smallint)
BEGIN
SELECT R.id_equipe_ramasseur, E.nom_equipe_ramasseur, COUNT(R.id_ramasseur)
FROM ramasseur R
INNER JOIN equipe_ramasseur E ON E.id_equipe_ramasseur = R.id_equipe_ramasseur
GROUP BY E.id_equipe_ramasseur
HAVING COUNT(R.id_ramasseur) > 6;
END |
DELIMITER ;



DELIMITER |
CREATE PROCEDURE afficher_equipe_ramasseur_dépassant_le_nombre_de_ramasseur_max (IN r_id_equipe_ramasseur smallint)
BEGIN
SELECT R.id_equipe_ramasseur, E.nom_equipe_ramasseur, COUNT(R.id_ramasseur)
FROM ramasseur R
INNER JOIN equipe_ramasseur E ON E.id_equipe_ramasseur = R.id_equipe_ramasseur
GROUP BY E.id_equipe_ramasseur
HAVING COUNT(R.id_ramasseur) < 6;
END |
DELIMITER ;



DELIMITER |
CREATE PROCEDURE afficher_equipe_ramasseur_plein (IN r_id_equipe_ramasseur smallint)
BEGIN
SELECT R.id_equipe_ramasseur, E.nom_equipe_ramasseur, COUNT(R.id_ramasseur)
FROM ramasseur R
INNER JOIN equipe_ramasseur E ON E.id_equipe_ramasseur = R.id_equipe_ramasseur
GROUP BY E.id_equipe_ramasseur
HAVING COUNT(R.id_ramasseur) = 6;
END |
DELIMITER ;



DELIMITER |
CREATE PROCEDURE afficher_vip_selon_nom_de_populairte (IN p_popularite_VIP varchar(15) )
BEGIN
Select id_VIP, nom_VIP, prenom_VIP
from vip
where id_Popularite in (select id_Popularite
                        from popularite
                        where popularite_VIP = p_popularite_VIP);
END |
DELIMITER ;



DELIMITER |
CREATE PROCEDURE afficher_reservation_selon_joueur(IN
j_id_joueur smallint)
BEGIN
    SELECT R.id_Reservation, CT.libelle_court, H.date_,H.id_Horaire
	from joueur J
	inner join reservation R
	ON R.id_Joueur=J.id_joueur
    inner join correspond2 C
    ON C.id_Reservation = R.id_Reservation
    inner join horaire H
    ON H.id_Horaire=C.id_Horaire
    inner join court CT
    ON CT.id_Court = R.id_Court
	where J.id_joueur = j_id_joueur;
END |
DELIMITER ;
