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
       //Elle retourne un tableau associatif avec les noms et prénoms des joueurs ainsi que les sets mis ordonné par les numéro de macths
       function getInfoTypeMatchTournoi($typeTournoi, $categorieTournoi) {
         $req = "SELECT R.id_Match, J.id_joueur, R.libelle_match, J.Nom_joueur, J.Prenom_joueur, J.Nationalite_joueur, M.Nb_jeu_simple FROM Marque M INNER JOIN rencontre R ON M.id_match = R.id_Match INNER JOIN joueur J ON M.id_joueur = J.id_joueur INNER JOIN tournoi T ON R.id_Tournoi = T.id_Tournoi WHERE T.type_tournoi like '$typeTournoi' AND T.categorie_tournoi like '$categorieTournoi' ORDER BY R.id_Match, J.id_joueur";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }
    }

    ?>