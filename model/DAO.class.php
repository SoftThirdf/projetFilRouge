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

       function getTournois() {
         $req = "SELECT T.id_Tournoi, T.type_tournoi, T.categorie_tournoi FROM Tournoi T";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       function getCourts() {
         $req = "SELECT id_Court, libelle_court FROM Court";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       function getJoueurs() {
         $req = "SELECT id_joueur, nom_joueur, prenom_joueur FROM Joueur";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       function getArbitres() {
         $req = "SELECT id_arbitre, nom_arbitre, prenom_arbitre FROM Arbitre";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       function getErbs() {
         $req = "Select * FROM equipe_ramasseur";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       function getErbsExcept1($idErb) {
         $req = "Select * FROM equipe_ramasseur WHERE id_equipe_ramasseur NOT IN(SELECT id_equipe_ramasseur FROM equipe_ramasseur WHERE id_equipe_ramasseur = $idErb)";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       function getJoueursExcept($idJoueur){
         $req = "SELECT id_joueur, nom_joueur, prenom_joueur FROM Joueur WHERE id_joueur NOT IN(SELECT id_joueur FROM Joueur WHERE id_joueur = $idJoueur)";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       function getJoueursExcept2($idJoueur1, $idJoueur2){
         $req = "SELECT id_joueur, nom_joueur, prenom_joueur FROM Joueur WHERE id_joueur NOT IN(SELECT id_joueur FROM Joueur WHERE id_joueur = $idJoueur1 OR id_joueur = $idJoueur2)";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       function getJoueursExcept3($idJoueur1, $idJoueur2, $idJoueur3){
         $req = "SELECT id_joueur, nom_joueur, prenom_joueur FROM Joueur WHERE id_joueur NOT IN(SELECT id_joueur FROM Joueur WHERE id_joueur = $idJoueur1 OR id_joueur = $idJoueur2 OR id_joueur = $idJoueur3)";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

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

    }

    ?>
