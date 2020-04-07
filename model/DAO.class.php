<?php

    require_once("rencontre.class.php");

    // Definition de l'unique objet de DAO
    $dao = new DAO();

    // Le Data Access Object
    // Il représente la base de donnée
    class DAO {
        // L'objet local PDO de la base de donnée
        private $db;

        // Constructeur chargé d'ouvrir la BD
        function __construct() {
          try {
            $this->db = new PDO('mysql:host=localhost;port=3308;dbname=testdb;charset=utf8', 'root', '');
          } catch (Exception $e) {
            die ("Erreur création PDO : ".$e->getMessage());
          }
        }

        // QUE FAIT LA METHODE ?
        // QU'EST-CE QU'ELLE RETOURNE ?
        // function NOMFONCTION() {
        //   $req = "REQUETE SQL";
        //   $sth = $this->db->query($req);
        //   $res = $sth->fetchAll(PDO::FETCH_CLASS,'NOM CLASS');
        //   return $res;
        // }

    //-------------------------- NOS REQUETES --------------------------//


       //Méthode qui renvoies les informlations lors d'un tournoi et d'une catégorie donnée en paramètre
       //Elle retourne un tableau associatif avec les noms et prénoms des joueurs ainsi que les sets mis ordonné par les numéro de matchs
       function getInfoTypeMatchTournoiSimple($typeTournoi) {
         $req = "SELECT R.id_Match, J.id_joueur, R.libelle_match, J.Nom_joueur, J.Prenom_joueur, J.Nationalite_joueur, B.Nb_jeu FROM balle_set B INNER JOIN rencontre R ON B.id_match = R.id_Match INNER JOIN joueur J ON B.id_joueur = J.id_joueur INNER JOIN tournoi T ON R.id_Tournoi = T.id_Tournoi WHERE T.type_tournoi like '$typeTournoi' AND T.categorie_tournoi like 'Simple' ORDER BY R.id_Match, J.id_joueur";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;


       }
       //Méthode qui renvoies les informlations lors d'un tournoi et d'une catégorie donnée en paramètre
       //Elle retourne un tableau associatif avec les noms et prénoms des joueurs ainsi que les sets mis ordonné par les numéro de matchs
       function getInfoTypeMatchTournoiDouble($typeTournoi) {
         $req = "SELECT R.id_Match, J.nom_equipe, J.id_joueur, J.nom_joueur, J.prenom_joueur, J.Nationalite_joueur, R.libelle_match, B.Nb_jeu FROM balle_set B INNER JOIN rencontre R ON B.id_match = R.id_Match INNER JOIN joueur J ON B.id_joueur = J.id_joueur INNER JOIN tournoi T ON R.id_Tournoi = T.id_Tournoi WHERE T.type_tournoi like '$typeTournoi' AND T.categorie_tournoi like 'Double' ORDER BY R.id_Match, J.id_joueur";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       //Méthode qui renvoi tout les tournois en cours
       //Elle retourne un tableau associatif de tournois
       function getTournois() {
         $req = "SELECT T.id_Tournoi, T.type_tournoi, T.categorie_tournoi FROM Tournoi T";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       //Méthode qui renvoi tout les courts de l'Open
       //Elle retourne un tableau associatif de court
       function getCourts() {
         $req = "SELECT id_Court, libelle_court FROM Court";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       //Méthode qui renvoi tout les joueurs
       //Elle retourne un tableau associatif de joueurs
       function getJoueurs() {
         $req = "SELECT id_joueur, nom_joueur, prenom_joueur FROM Joueur";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       //Méthode qui renvoi tout les arbitres
       //Elle retourne un tableau associatif d'arbitre
       function getArbitres() {
         $req = "SELECT id_arbitre, nom_arbitre, prenom_arbitre FROM Arbitre";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       //Méthode qui renvoi toutes les équipes de ramasseurs de balles
       //Elle retourne un tableau associatif d'équipe de ramasseur de balle
       function getErbs() {
         $req = "Select * FROM equipe_ramasseur";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       //Méthode qui renvoi toutes les équipes de ramasseurs de balles sans prendre en compte l'équipe de ramasseur de balle passé en paramètre
       //Elle retourne un tableau associatif d'équipe de ramasseur de balle
       function getErbsExcept1($idErb) {
         $req = "Select * FROM equipe_ramasseur WHERE id_equipe_ramasseur NOT IN(SELECT id_equipe_ramasseur FROM equipe_ramasseur WHERE id_equipe_ramasseur = $idErb)";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       //Méthode qui renvoi tout les joueurs sans prendre en compte le joueur passé en paramètre
       //Elle retourne un tableau associatif de joueur
       function getJoueursExcept($idJoueur){
         $req = "SELECT id_joueur, nom_joueur, prenom_joueur FROM Joueur WHERE id_joueur NOT IN(SELECT id_joueur FROM Joueur WHERE id_joueur = $idJoueur)";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       //Méthode qui renvoi tout les joueurs sans prendre en compte les joueurs passés en paramètre
       //Elle retourne un tableau associatif de joueur
       function getJoueursExcept2($idJoueur1, $idJoueur2){
         $req = "SELECT id_joueur, nom_joueur, prenom_joueur FROM Joueur WHERE id_joueur NOT IN(SELECT id_joueur FROM Joueur WHERE id_joueur = $idJoueur1 OR id_joueur = $idJoueur2)";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       //Méthode qui renvoi tout les joueurs sans prendre en compte les joueurs passés en paramètre
       //Elle retourne un tableau associatif de joueur
       function getJoueursExcept3($idJoueur1, $idJoueur2, $idJoueur3){
         $req = "SELECT id_joueur, nom_joueur, prenom_joueur FROM Joueur WHERE id_joueur NOT IN(SELECT id_joueur FROM Joueur WHERE id_joueur = $idJoueur1 OR id_joueur = $idJoueur2 OR id_joueur = $idJoueur3)";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       //Méthode qui insère une rencontre dans la base de donnée
       //Elle retourne un boolean qui représente si l'insertion a été effectuée ou non
       function insertRencontre($typeMatch,$nomGagnant, $libelle_match, $idCourt, $id_Tournoi, $idJoueur1, $idJoueur2, $idJoueur3, $idJoueur4, $idErb1, $idErb2, $idArbitre1,$idArbitre2,$idArbitre3,$idArbitre4,$idArbitre5,$idArbitre6,$idArbitre7,$idArbitre8,$idArbitre9,$idArbitre10,$categorieMatch){
         $req = $this->db->prepare("INSERT INTO RENCONTRE(type_match,nom_equipe_gagnant,libelle_match,id_Court,id_Tournoi,id_joueur1,id_joueur2,id_joueur3,id_joueur4,id_equipe_ramasseur1,id_equipe_ramasseur2,id_arbitre1,id_arbitre2,id_arbitre3,id_arbitre4,id_arbitre5,id_arbitre6,id_arbitre7,id_arbitre8,id_arbitre9,id_arbitre10)
         VALUES (:type_match,:nomGagnant,:libelle_match,:idCourt,:id_Tournoi,:idJoueur1,:idJoueur2,:idJoueur3,:idJoueur4,:idErb1,:idErb2,:idArbitre1,:idArbitre2,:idArbitre3,:idArbitre4,:idArbitre5,:idArbitre6,:idArbitre7,:idArbitre8,:idArbitre9,:idArbitre10)");

         $req->bindValue(':type_match',$typeMatch, PDO::PARAM_STR);
         $req->bindValue(':nomGagnant',$nomGagnant, PDO::PARAM_STR);
         $req->bindValue(':libelle_match',$libelle_match, PDO::PARAM_STR);
         $req->bindValue(':idCourt',$idCourt, PDO::PARAM_INT);
         $req->bindValue(':id_Tournoi',$id_Tournoi, PDO::PARAM_INT);
         $req->bindValue(':idJoueur1',$idJoueur1, PDO::PARAM_INT);
         $req->bindValue(':idJoueur2',$idJoueur2, PDO::PARAM_INT);

         if ($categorieMatch=="simple") {
           $req->bindValue(':idJoueur3',$idJoueur3, PDO::PARAM_NULL);
           $req->bindValue(':idJoueur4',$idJoueur4, PDO::PARAM_NULL);
         }else{
           $req->bindValue(':idJoueur3',$idJoueur3, PDO::PARAM_INT);
           $req->bindValue(':idJoueur4',$idJoueur4, PDO::PARAM_INT);
         }

         $req->bindValue(':idErb1',$idErb1, PDO::PARAM_INT);
         $req->bindValue(':idErb2',$idErb2, PDO::PARAM_INT);
         $req->bindValue(':idArbitre1',$idArbitre1, PDO::PARAM_INT);
         $req->bindValue(':idArbitre2',$idArbitre2, PDO::PARAM_INT);
         $req->bindValue(':idArbitre3',$idArbitre3, PDO::PARAM_INT);
         $req->bindValue(':idArbitre4',$idArbitre4, PDO::PARAM_INT);
         $req->bindValue(':idArbitre5',$idArbitre5, PDO::PARAM_INT);
         $req->bindValue(':idArbitre6',$idArbitre6, PDO::PARAM_INT);
         $req->bindValue(':idArbitre7',$idArbitre7, PDO::PARAM_INT);
         $req->bindValue(':idArbitre8',$idArbitre8, PDO::PARAM_INT);
         $req->bindValue(':idArbitre9',$idArbitre9, PDO::PARAM_INT);
         $req->bindValue(':idArbitre10',$idArbitre10, PDO::PARAM_INT);

         $res=$req->execute();

         return $res;
       }

       //Méthode qui insère un arbitre dans la base de donnée
       //Elle retourne un boolean qui représente si l'insertion a été effectuée ou non
       function insertArbitre($typeArbitre,$categorieArbitre,$nomArbitre,$prenomArbitre,$nationaliteArbitre,$telephoneArbitre){
         $req = $this->db->prepare("INSERT INTO ARBITRE(type_arbitre,categorie_arbitre,nom_arbitre,prenom_arbitre,nationalite_arbitre,telephone_arbitre) VALUES(:type_arbitre,:categorie_arbitre,:nom_arbitre,:prenom_arbitre,:nationalite_arbitre,:telephone_arbitre)");
         $req->bindValue(':type_arbitre',$typeArbitre, PDO::PARAM_STR);
         $req->bindValue(':categorie_arbitre',$categorieArbitre, PDO::PARAM_STR);
         $req->bindValue(':nom_arbitre',$nomArbitre, PDO::PARAM_STR);
         $req->bindValue(':prenom_arbitre',$prenomArbitre, PDO::PARAM_STR);
         $req->bindValue(':nationalite_arbitre',$nationaliteArbitre, PDO::PARAM_STR);
         $req->bindValue(':telephone_arbitre',$telephoneArbitre, PDO::PARAM_STR);

         $res=$req->execute();

         return $res;
       }

       //Méthode qui insère un joueur dans la base de donnée
       //Elle retourne un boolean qui représente si l'insertion a été effectuée ou non
       function insertJoueur($nomJoueur,$prenomJoueur,$nationaliteJoueur,$ageJoueur,$nomEquipe,$login,$mdp){
         $req = $this->db->prepare("INSERT INTO JOUEUR (nom_joueur,prenom_joueur,nationalite_joueur,age_joueur,nom_equipe,login,mdp) VALUES(:nom_joueur,:prenom_joueur,:nationalite_joueur,:age_joueur,:nom_equipe,:login,:mdp)");
         $req->bindValue(':nom_joueur',$nomJoueur, PDO::PARAM_STR);
         $req->bindValue(':prenom_joueur',$prenomJoueur, PDO::PARAM_STR);
         $req->bindValue(':nationalite_joueur',$nationaliteJoueur, PDO::PARAM_STR);
         $req->bindValue(':age_joueur',$ageJoueur, PDO::PARAM_INT);
         $req->bindValue(':nom_equipe',$nomEquipe, PDO::PARAM_STR);
         $req->bindValue(':login',$login, PDO::PARAM_STR);
         $req->bindValue(':mdp',$mdp, PDO::PARAM_STR);

         $res=$req->execute();

         return $res;
       }

       //Méthode qui renvoi tout les matchs double en cours (qui ne sont pas terminés)
       //Elle retourne un tableau associatif retournant des matchs
       function matchsDoubleEnCours(){
         $req = "SELECT r.id_Match,j.id_joueur as 'id_j1', j.nom_joueur as 'nom_j1', j.prenom_joueur as 'prenom_j1',
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
         AND r.id_joueur4 IN (SELECT id_joueur FROM joueur)";

         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }


       //Méthode qui renvoi tout les matchs simple en cours (qui ne sont pas terminés)
       //Elle retourne un tableau associatif retournant des matchs
       function matchsSimpleEnCours(){
         $req = "SELECT r.id_Match,j.id_joueur as 'id_j1',j.nom_joueur as 'nom_j1', j.prenom_joueur as 'prenom_j1',j2.id_joueur as 'id_j2',j2.nom_joueur as 'nom_j2', j2.prenom_joueur as 'prenom_j2'
         FROM rencontre r
         INNER JOIN se_deroule2 se ON se.id_Match = r.id_Match
         INNER JOIN horaire h ON h.id_Horaire = se.id_Horaire
         INNER JOIN joueur j ON j.id_joueur = r.id_joueur1
         INNER JOIN joueur j2 ON j2.id_joueur = r.id_joueur2
         INNER JOIN tournoi t ON t.id_Tournoi = r.id_Tournoi
         WHERE h.heure_fin IS NULL
         AND t.categorie_tournoi like 'Simple'
         AND r.nom_equipe_gagnant IS NULL
         AND r.id_joueur2 IN (SELECT id_joueur FROM joueur)";

         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       //Méthode qui renvoi tout les sets d'un match en cours passé en paramètre
       //Elle retourne un tableau associatif retournant des balle_set
       function getBalleSetMatch($idMatch){
         $req = "SELECT j.nom_joueur, j.prenom_joueur, b.nb_jeu
         FROM balle_set b
         INNER JOIN joueur j ON j.id_joueur = b.id_joueur
         WHERE b.id_match = $idMatch";

         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       //Méthode qui insère ou met à jour dans la base de donnée un set marqué par un joueur
       //Elle retourne un boolean pour savoir si l'insertion ou l'update a bien été mise à jour
       function insertBalleSet($id_joueur,$id_match,$duree){

         $req = "SELECT b.id_set, j.nom_joueur, j.prenom_joueur, b.nb_jeu
         FROM balle_set b
         INNER JOIN joueur j ON j.id_joueur = b.id_joueur
         WHERE b.id_match = $id_match
         AND j.id_joueur = $id_joueur
         ORDER BY b.id_set DESC
         LIMIT 1";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);

         if (sizeof($res)==0 || $res['nb_jeu']>=6) {
           $req2 = $this->db->prepare("INSERT INTO BALLE_SET (nb_jeu,duree_set,id_Match,id_joueur) VALUES(:jeu,:duree,:id_match,:id_joueur)");
           $req2->bindValue(':jeu',1, PDO::PARAM_INT);
           $req2->bindValue(':id_match',$id_match, PDO::PARAM_INT);
           $req2->bindValue(':id_joueur',$id_joueur, PDO::PARAM_INT);
           $req2->bindValue(':duree',$duree, PDO::PARAM_INT);
         }else{
           $nb = $res[0]['nb_jeu']+1;
           $idset=$res[0]['id_set'];
           $req2 = $this->db->prepare("UPDATE BALLE_SET SET nb_jeu=:jeu WHERE id_Match=:id_match AND id_joueur=:id_joueur AND id_set=:idset");
           $req2->bindValue(':jeu',$nb, PDO::PARAM_INT);
           $req2->bindValue(':id_match',$id_match, PDO::PARAM_INT);
           $req2->bindValue(':id_joueur',$id_joueur, PDO::PARAM_INT);
           $req2->bindValue(':idset',$idset, PDO::PARAM_INT);
         }
         $res2 = $req2->execute();
         return $res2;
       }

    }

    ?>
