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


       //Méthode qui permet d'avoir la liste des rencontres selon un type de match et de tournoi
       //Elle retourne un tableau de class Rencontre
       function getRencontreTypeMatchTournoi($typeMatch, $typeTournoi) {
         $req = '';
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_CLASS,'Rencontre');
         return $res;
       }
    }

    ?>
