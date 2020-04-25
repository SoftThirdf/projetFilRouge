<?php
function getMatch() {
  $bdd = new PDO('mysql:host=localhost;port=8889;dbname=testdb;charset=utf8', 'root', 'root');
  //$req = $bdd->query('SELECT DISTINCT R.id_Match, R.type_match, R.libelle_match, C.id_court,  C.libelle_court, H.id_horaire, H.date_, SD.libelle_horaire, H.heure_debut, J1.id_joueur, J1.nom_joueur AS nom_joueur1, J1.prenom_joueur AS prenom_joueur1, J1.nom_equipe AS nom_equipe1, J2.id_joueur, J2.nom_joueur AS nom_joueur2, J2.prenom_joueur AS prenom_joueur2, J2.nom_equipe AS nom_equipe2, T.categorie_tournoi, T.type_tournoi FROM rencontre R  INNER JOIN joueur J1 on R.id_joueur1 = J1.id_joueur OR R.id_joueur2 = J1.id_joueur  INNER JOIN joueur J2 on R.id_joueur1 = J2.id_joueur OR R.id_joueur2 = J2.id_joueur INNER JOIN se_deroule2 SD ON SD.id_Match = R.id_Match INNER JOIN court C ON C.id_court = R.id_court INNER JOIN horaire H ON H.id_Horaire = SD.id_Horaire INNER JOIN tournoi T ON T.id_tournoi = R.id_tournoi WHERE J1.id_joueur < J2.id_joueur AND T.categorie_tournoi LIKE 'simple' AND R.libelle_match LIKE '1/8' ORDER BY R.id_Match');
    $req = $bdd->query('SELECT id_Match, type_match, libelle_match, FROM rencontre R WHERE libelle_match LIKE '1/8'');
  return $req;
}
?>
