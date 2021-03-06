<?php

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
      $req = "SELECT R.id_Match, J.id_joueur, R.libelle_match, J.Nom_joueur, J.Prenom_joueur, J.Nationalite_joueur, B.Nb_jeu
        FROM balle_set B INNER JOIN rencontre R ON B.id_match = R.id_Match INNER JOIN joueur J ON B.id_joueur = J.id_joueur INNER JOIN tournoi T ON R.id_Tournoi = T.id_Tournoi WHERE T.type_tournoi like '$typeTournoi'
        AND T.categorie_tournoi like 'Simple' ORDER BY R.id_Match, J.id_joueur";
      $sth = $this->db->query($req);
      $res = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $res;
    }

    //Méthode qui renvoies les informlations lors d'un tournoi et d'une catégorie donnée en paramètre
    //Elle retourne un tableau associatif avec les noms et prénoms des joueurs ainsi que les sets mis ordonné par les numéro de matchs
    function getInfoTypeMatchTournoiDouble($typeTournoi) {
      $req = "SELECT R.id_Match, J.nom_equipe, J.id_joueur, J.nom_joueur, J.prenom_joueur, J.Nationalite_joueur, R.libelle_match, B.num_set, B.Nb_jeu FROM balle_set B INNER JOIN rencontre R ON B.id_match = R.id_Match INNER JOIN joueur J ON B.id_joueur = J.id_joueur INNER JOIN tournoi T ON R.id_Tournoi = T.id_Tournoi WHERE T.type_tournoi like '$typeTournoi' AND T.categorie_tournoi like 'Double' ORDER BY R.id_Match, J.id_joueur";
      $sth = $this->db->query($req);
      $res = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $res;
    }

       //Méthode qui renvoie l'utilisateur correspondant aux login et mdp renseignés
       function getUtilisateur($Login, $Mdp){
         $req= "SELECT j.nom_joueur, j.prenom_joueur, j.id_joueur,j.nom_equipe,j.nationalite_joueur, j.login, j.mdp FROM joueur j WHERE j.login= \"$Login\" AND j.mdp= \"$Mdp\"";
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

       //Méthode qui modifie le mot de passe
       function setMdp($Login, $nouveaumdp){
         $req= "UPDATE joueur j SET j.mdp = \"$nouveaumdp\" WHERE j.login like \"$Login\"";
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
       function insertRencontre($typeMatch,$nomGagnant, $libelle_match, $idCourt, $id_Tournoi, $idJoueur1, $idJoueur2, $idJoueur3, $idJoueur4, $idErb1, $idErb2, $idArbitre1,$idArbitre2,$idArbitre3,$idArbitre4,$idArbitre5,$idArbitre6,$idArbitre7,$idArbitre8,$idArbitre9,$idArbitre10,$categorieMatch, $date, $horaire){
         $req = $this->db->prepare("INSERT INTO RENCONTRE(type_match,nom_equipe_gagnant,libelle_match,id_Court,id_Tournoi,id_joueur1,id_joueur2,id_joueur3,id_joueur4,id_equipe_ramasseur1,id_equipe_ramasseur2,id_arbitre1,id_arbitre2,id_arbitre3,id_arbitre4,id_arbitre5,id_arbitre6,id_arbitre7,id_arbitre8,id_arbitre9,id_arbitre10)
         VALUES (:type_match,:nomGagnant,:libelle_match,:idCourt,:id_Tournoi,:idJoueur1,:idJoueur2,:idJoueur3,:idJoueur4,:idErb1,:idErb2,:idArbitre1,:idArbitre2,:idArbitre3,:idArbitre4,:idArbitre5,:idArbitre6,:idArbitre7,:idArbitre8,:idArbitre9,:idArbitre10)");

         $req->bindValue(':type_match',$typeMatch, PDO::PARAM_STR);
         $req->bindValue(':nomGagnant',$nomGagnant, PDO::PARAM_NULL);
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

         // Avoir l'id du match inséré

         if ($categorieMatch=="simple") {
           $reqIdMatch = "SELECT r.id_Match
           FROM rencontre r
           WHERE r.libelle_match like \"$libelle_match\"
           AND r.type_match like \"$typeMatch\"
           AND r.id_joueur1 = $idJoueur1
           AND r.id_joueur2 = $idJoueur2
           AND r.id_joueur3 IS NULL
           AND r.id_joueur4 IS NULL
           AND r.id_Court = $idCourt
           AND r.id_Tournoi = $id_Tournoi";
           $sth = $this->db->query($reqIdMatch);
           $resIdMatch = $sth->fetchAll(PDO::FETCH_ASSOC);
           $idMatch = $resIdMatch[0]['id_Match'];
         }else{
           $reqIdMatch = "SELECT r.id_Match
           FROM rencontre r
           WHERE r.libelle_match like \"$libelle_match\"
           AND r.type_match like \"$typeMatch\"
           AND r.id_joueur1 = $idJoueur1
           AND r.id_joueur2 = $idJoueur2
           AND r.id_joueur3 = $idJoueur3
           AND r.id_joueur4 = $idJoueur4
           AND r.id_Court = $idCourt
           AND r.id_Tournoi = $id_Tournoi";
           $sth = $this->db->query($reqIdMatch);
           $resIdMatch = $sth->fetchAll(PDO::FETCH_ASSOC);
           $idMatch = $resIdMatch[0]['id_Match'];
         }

         // insérer dans horaire

         if ($horaire == "Matin") {
           $hd ='11:30:00';
           $hf = null;
         }elseif($horaire == "Midi"){
           $hd ='14:00:00';
           $hf = null;
         }elseif($horaire == "Soirée"){
           $hd ='16:00:00';
           $hf = null;
         }

         $reqInsertHoraire = $this->db->prepare("INSERT INTO HORAIRE(heure_debut,date_,heure_fin) VALUES (:heure_debut,:dateR,:heure_fin)");
         $reqInsertHoraire->bindValue(':heure_debut',$hd, PDO::PARAM_STR);
         $reqInsertHoraire->bindValue(':dateR',$date, PDO::PARAM_STR);
         $reqInsertHoraire->bindValue(':heure_fin',$hf, PDO::PARAM_NULL);
         $resInsertHoraire=$reqInsertHoraire->execute();

         // insérer dans se_deroule2

         $reqIdHoraire = "SELECT h.id_Horaire
          FROM horaire h
          WHERE h.heure_debut = \"$hd\"
          AND h.heure_fin IS NULL
          AND h.date_ = \"$date\"
          ORDER BY h.id_Horaire DESC
          LIMIT 1";
          $sth = $this->db->query($reqIdHoraire);
          $resIdHoraire = $sth->fetchAll(PDO::FETCH_ASSOC);
          $idHoraire = $resIdHoraire[0]['id_Horaire'];

          $reqInsertSeDeroule = $this->db->prepare("INSERT INTO SE_DEROULE2(id_Match,id_Horaire,libelle_horaire) VALUES(:idMatch,:idHoraire,:libelle_horaire);");
          $reqInsertSeDeroule->bindValue(':idMatch',$idMatch, PDO::PARAM_INT);
          $reqInsertSeDeroule->bindValue(':idHoraire',$idHoraire, PDO::PARAM_INT);
          $reqInsertSeDeroule->bindValue(':libelle_horaire',$horaire, PDO::PARAM_STR);
          $resInsertSeDeroule=$reqInsertSeDeroule->execute();

         return $resInsertSeDeroule;
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
         $req = "SELECT b.num_set,j.nom_equipe, j.nom_joueur, j.prenom_joueur, b.nb_jeu
          FROM balle_set b
          INNER JOIN joueur j ON j.id_joueur = b.id_joueur
          WHERE b.id_match = $idMatch
          ORDER BY b.num_set, j.nom_equipe";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       //Méthode qui met à jour dans la base de donnée un set marqué par un joueur
       //Elle retourne un boolean pour savoir si l'update a bien été mise à jour
       function insertJeu($id_joueur,$id_match,$duree){
         $req = "SELECT b.id_set, b.nb_jeu, b.num_set
           FROM balle_set b
           INNER JOIN joueur j ON j.id_joueur = b.id_joueur
           WHERE b.id_match = $id_match
           AND j.id_joueur = $id_joueur
           ORDER BY b.id_set DESC
           LIMIT 1";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);

         $id_set = $res[0]['id_set'];
         $nb_jeu = $res[0]['nb_jeu']+1;
         $num_set=$res[0]['num_set'];
         $req2 = $this->db->prepare("UPDATE BALLE_SET SET nb_jeu=:jeu WHERE id_Match=:id_match AND id_joueur=:id_joueur AND id_set=:idset AND num_set=:num_set");
         $req2->bindValue(':jeu',$nb_jeu, PDO::PARAM_INT);
         $req2->bindValue(':id_match',$id_match, PDO::PARAM_INT);
         $req2->bindValue(':id_joueur',$id_joueur, PDO::PARAM_INT);
         $req2->bindValue(':idset',$id_set, PDO::PARAM_INT);
         $req2->bindValue(':num_set',$num_set, PDO::PARAM_INT);

         $res2 = $req2->execute();
         return $res2;
       }


       //Méthode qui insère dans la base de donnée les set pourchaque joueurs
       //Elle retourne un boolean pour savoir si l'insertion a bien été faite
       function insertSet($id_match){
         $req = "SELECT r.id_Match, r.id_joueur1, r.id_joueur2, r.id_joueur3, r.id_joueur4, b.num_set
          FROM rencontre r
          LEFT OUTER JOIN balle_set b ON b.id_Match = r.id_Match
          WHERE r.id_match = $id_match
          ORDER BY b.num_set DESC
          LIMIT 1";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);

         if ($res[0]['num_set']==null) {
           $num_set = 1;
         }else{
           $num_set = $res[0]['num_set'] + 1;
         }

         if ($res[0]['id_joueur3']==null && $res[0]['id_joueur4']==null) {
           $req2 = $this->db->prepare("
           INSERT INTO BALLE_SET (nb_jeu,duree_set,id_Match,id_joueur,num_set) VALUES(:jeu,:duree,:id_match,:id_joueur1,:num_set);
           INSERT INTO BALLE_SET (nb_jeu,duree_set,id_Match,id_joueur,num_set) VALUES(:jeu,:duree,:id_match,:id_joueur2,:num_set);
           ");
         }else{
           $id_joueur3 = $res[0]['id_joueur3'];
           $id_joueur4 = $res[0]['id_joueur4'];
           $req2 = $this->db->prepare("
           INSERT INTO BALLE_SET (nb_jeu,duree_set,id_Match,id_joueur,num_set) VALUES(:jeu,:duree,:id_match,:id_joueur1,:num_set);
           INSERT INTO BALLE_SET (nb_jeu,duree_set,id_Match,id_joueur,num_set) VALUES(:jeu,:duree,:id_match,:id_joueur2,:num_set);
           INSERT INTO BALLE_SET (nb_jeu,duree_set,id_Match,id_joueur,num_set) VALUES(:jeu,:duree,:id_match,:id_joueur3,:num_set);
           INSERT INTO BALLE_SET (nb_jeu,duree_set,id_Match,id_joueur,num_set) VALUES(:jeu,:duree,:id_match,:id_joueur4,:num_set);
           ");
           $req2->bindValue(':id_joueur3',$id_joueur3, PDO::PARAM_INT);
           $req2->bindValue(':id_joueur4',$id_joueur4, PDO::PARAM_INT);
         }

         $id_joueur1 = $res[0]['id_joueur1'];
         $id_joueur2 = $res[0]['id_joueur2'];

         $req2->bindValue(':jeu',0, PDO::PARAM_INT);
         $req2->bindValue(':id_joueur1',$id_joueur1, PDO::PARAM_INT);
         $req2->bindValue(':id_joueur2',$id_joueur2, PDO::PARAM_INT);
         $req2->bindValue(':id_match',$id_match, PDO::PARAM_INT);
         $req2->bindValue(':duree',30, PDO::PARAM_INT);
         $req2->bindValue(':num_set',$num_set, PDO::PARAM_INT);

         $res2 = $req2->execute();
         return $res2;
       }

       //Méthode qui met à jour et calcule le gagant d'un match
       //Elle retourne un boolean pour savoir si la mise à jour a bien été faite
       function termineMatch($id_match){
         $req = "SELECT b.num_set,j.nom_equipe, SUM(b.nb_jeu) as 'nb_jeu'
          FROM balle_set b
          INNER JOIN joueur j ON j.id_joueur = b.id_joueur
          WHERE b.id_Match = $id_match
          GROUP BY b.num_set,j.nom_equipe";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);

        $setWinE1= 0;
        $setWinE2 = 0;
        $E1 = $res[0]['nom_equipe'];
        $E2= $res[1]['nom_equipe'];

        $numSetCourant=0;

          for ($i=0; $i < sizeof($res) ; $i++) {
              if ($res[$i]['num_set'] != $numSetCourant) {
                $numSetCourant = $res[$i]['num_set'];
                if ($res[$i]['nb_jeu'] > $res[$i+1]['nb_jeu'])  {
                  $setWinE1++;
                }elseif ($res[$i]['nb_jeu'] < $res[$i+1]['nb_jeu']) {
                  $setWinE2++;
                }
              }
          }

          if ($setWinE1 > $setWinE2) {
            $gagnant=$E1;
          }else{
            $gagnant=$E2;
          }

         $req2 = $this->db->prepare("UPDATE RENCONTRE SET nom_equipe_gagnant=:nom_equipe_gagnant WHERE id_Match=:id_match");
         $req2->bindValue(':id_match',$id_match, PDO::PARAM_INT);
         $req2->bindValue(':nom_equipe_gagnant',$gagnant, PDO::PARAM_STR);

         $res2 = $req2->execute();
         return $res2;
       }

       //Méthode qui retourne les informations d'un VIP suivant l'id passé en paramètre de la fonction
       //Elle retourne un tableau associatif avec les informations du VIP
       function getInfoVIP($idVIP){
         $req="SELECT V.id_VIP, V.nom_VIP, V.prenom_VIP, P.popularite_VIP, V.type_VIP, V.nationalite_VIP, V.nb_grands_chelems, V.classement_ATP_simple, V.classement_ATP_double FROM vip V, popularite P WHERE V.id_popularite = P.id_popularite AND V.id_VIP = $idVIP;";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       //Méthode qui permet d'obtenir toutes les informations de tout les VIP
       //Elle retourne un tableau associatif avec les informations de chaque VIP
       function getAllVIP(){
         $req='SELECT V.id_VIP, V.nom_VIP, V.prenom_VIP, P.popularite_VIP FROM vip V, popularite P WHERE V.id_Popularite = P.id_Popularite ORDER BY P.id_popularite DESC';
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       //Méthode qui permet d'obtenir les informations des vip passés en paramètres
       //Elle retourne un tableau associatif de vip
       function getVIPDedicaces($nomVIP1, $prenomVIP1, $nomVIP2, $prenomVIP2, $nomVIP3, $prenomVIP3){
         $req="SELECT V.id_VIP, V.nom_VIP, V.prenom_VIP, P.popularite_VIP, V.type_VIP, V.nationalite_VIP, V.nb_grands_chelems, V.classement_ATP_simple, V.classement_ATP_double
         FROM vip V, popularite P
         WHERE V.id_popularite = P.id_popularite
         AND V.nom_VIP LIKE \"$nomVIP1\"
         AND V.prenom_VIP LIKE \"$prenomVIP1\"

         UNION
         SELECT V.id_VIP, V.nom_VIP, V.prenom_VIP, P.popularite_VIP, V.type_VIP, V.nationalite_VIP, V.nb_grands_chelems, V.classement_ATP_simple, V.classement_ATP_double
         FROM vip V, popularite P
         WHERE V.id_popularite = P.id_popularite
         AND V.nom_VIP LIKE \"$nomVIP2\"
         AND V.prenom_VIP LIKE \"$prenomVIP2\"

         UNION
         SELECT V.id_VIP, V.nom_VIP, V.prenom_VIP, P.popularite_VIP, V.type_VIP, V.nationalite_VIP, V.nb_grands_chelems, V.classement_ATP_simple, V.classement_ATP_double
         FROM vip V, popularite P
         WHERE V.id_popularite = P.id_popularite
         AND V.nom_VIP LIKE \"$nomVIP3\"
         AND V.prenom_VIP LIKE \"$prenomVIP3\"";

         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;

       }

       //Méthode qui permet d'obtenir toutes les réservations d'un joueur
       //Elle retourne un tableau associatif avec les réservations d'un joueur
       function getReservations ($idJoueur){
         $req="SELECT r.id_reservation, c.libelle_court, h.date_, h.heure_debut, h.heure_fin
                FROM reservation r
                INNER JOIN joueur j ON j.id_joueur = r.id_Joueur
                INNER JOIN correspond2 co ON co.id_Reservation = r.id_Reservation
                INNER JOIN horaire h ON h.id_Horaire = co.id_Horaire
                INNER JOIN court c ON r.id_Court = c.id_Court
                WHERE j.id_joueur = $idJoueur";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }

       //Méthode qui permet d'obtenir tous les courts non utilisés lors des horaires renseignés
       //Elle retourne un tableau associatif avec les courts disponibles
       function getCourtsDispo($date, $heure_debut,$heure_fin){
         $req="SELECT c.id_Court, c.libelle_court
                FROM court c
                WHERE c.id_Court NOT IN (
                  SELECT r.id_Court
                  FROM reservation r
                  INNER JOIN correspond2 co ON co.id_Reservation = r.id_Reservation
                  INNER JOIN horaire h ON h.id_Horaire = co.id_Horaire
                  WHERE date_ = \"$date\"
                  AND heure_debut >= \"$heure_debut\"
                	AND heure_fin <= \"$heure_fin\")
                AND c.id_Court NOT IN (
                  SELECT re.id_Court
                  FROM rencontre re
                  INNER JOIN se_deroule2 se ON se.id_Match = re.id_Match
                  INNER JOIN horaire h ON h.id_Horaire = se.id_Horaire
                  WHERE date_ = \"$date\"
                  AND heure_debut >= \"$heure_debut\"
                  AND heure_fin <= \"$heure_fin\")
                ";
         $sth = $this->db->query($req);
         $res = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $res;
       }


       //Méthode qui insère une réservation faite par un joueur et vérifie que le joueurs peut effectuer cette réservation
       //Elle retourne un boolean
       function insertReservation($idJoueur, $date, $heure_debut, $heure_fin, $court){
         $reqVerifDispo = "SELECT h.date_, h.heure_debut
          FROM horaire h
          INNER JOIN se_deroule2 se ON se.id_Horaire = h.id_Horaire
          INNER JOIN rencontre r ON r.id_Match = se.id_Match
          WHERE r.id_joueur1 = $idJoueur
          OR r.id_joueur2 = $idJoueur
          OR r.id_joueur3 = $idJoueur
          OR r.id_joueur4 = $idJoueur

          UNION

          SELECT h.date_, h.heure_debut
          FROM horaire h
          INNER JOIN correspond2 c ON c.id_Horaire = h.id_Horaire
          INNER JOIN reservation re ON re.id_Reservation = c.id_Reservation
          WHERE re.id_Joueur = $idJoueur";

          $sth = $this->db->query($reqVerifDispo);
          $resVerifDispo = $sth->fetchAll(PDO::FETCH_ASSOC);

          $possible = true;
          foreach ($resVerifDispo as $key => $dispo) {
            if ($dispo['date_'] == $date && $dispo['heure_debut']==($heure_debut.":00")) {
              $possible = false;
            }
          }

          if ($possible) {

         $req = $this->db->prepare("INSERT INTO RESERVATION (id_Court, id_joueur) VALUES (:court, :id_joueur)");

         $req->bindValue(':id_joueur',$idJoueur, PDO::PARAM_INT);
         $req->bindValue(':court',$court, PDO::PARAM_INT);
         $res = $req->execute();

           if($res){
             $req2 = $this->db->prepare("INSERT INTO HORAIRE(heure_debut,date_,heure_fin) VALUES (:heure_debut,:dateR,:heure_fin)");
             $req2->bindValue(':dateR',$date, PDO::PARAM_STR);
             $req2->bindValue(':heure_debut',$heure_debut, PDO::PARAM_STR);
             $req2->bindValue(':heure_fin',$heure_fin, PDO::PARAM_STR);
             $res2 = $req2->execute();

             if($res2){

               $reqIDHoraire = "SELECT h.id_Horaire FROM horaire h WHERE h.heure_debut = \"$heure_debut\" AND h.date_ = \"$date\" AND h.heure_fin = \"$heure_fin\" ORDER BY h.id_Horaire DESC LIMIT 1";
               $sth = $this->db->query($reqIDHoraire);
               $reqIDHoraire = $sth->fetchAll(PDO::FETCH_ASSOC);

               $reqIDReserv = "SELECT r.id_Reservation FROM reservation r WHERE r.id_Court=$court AND r.id_Joueur = $idJoueur ORDER BY r.id_Reservation DESC LIMIT 1";
               $sth = $this->db->query($reqIDReserv);
               $resIDReserv = $sth->fetchAll(PDO::FETCH_ASSOC);

               $idHoraire = $reqIDHoraire[0]['id_Horaire'];
               $idReserv = $resIDReserv[0]['id_Reservation'];

               if ($idReserv >= 0 && $idHoraire>=0) {
                 $req3 = $this->db->prepare("INSERT INTO CORRESPOND2(id_Reservation, id_Horaire) VALUES (:id_Reservation, :id_Horaire)");
                 $req3->bindValue(':id_Reservation',$idReserv, PDO::PARAM_INT);
                 $req3->bindValue(':id_Horaire',$idHoraire, PDO::PARAM_INT);
                 $res3 = $req3->execute();
                 return $res3;
               }else{
                 return null;
               }

             }else{
               return null;
             }
           }else{
             return null;
           }
         }else{
           return null;
         }
       }

   //Méthode qui permet d'obtenir tout les matchs Double d'un joueurs passé en paramètre
   //Elle retourne un tableau associatif avec les informations de ces matchs
		function getMonPlanningDouble($IdJoueur) {
			$req = "SELECT DISTINCT R.type_match, R.libelle_match,C.libelle_court, H.date_, SD.libelle_horaire, H.heure_debut, J1.nom_equipe AS nom_equipe1, J1.nom_joueur AS nom_joueur1,
              J1.prenom_joueur AS prenom_joueur1, J2.nom_joueur AS nom_joueur2, J2.prenom_joueur AS prenom_joueur2, J2.nom_equipe AS nom_equipe2, J3.nom_joueur AS nom_joueur3, J3.prenom_joueur AS prenom_joueur3,J4.nom_joueur AS nom_joueur4, J4.prenom_joueur AS prenom_joueur4,T.categorie_tournoi, T.type_tournoi
              FROM rencontre R
              INNER JOIN joueur J1 on R.id_joueur1 = J1.id_joueur OR R.id_joueur2 = J1.id_joueur AND R.id_joueur3 = J1.id_joueur AND R.id_joueur4 = J1.id_joueur
              INNER JOIN joueur J2 on R.id_joueur1 = J2.id_joueur OR R.id_joueur2 = J2.id_joueur
              INNER JOIN joueur J3 on R.id_joueur3 = J3.id_joueur OR R.id_joueur3 = J3.id_joueur
              INNER JOIN joueur J4 on R.id_joueur3 = J4.id_joueur OR R.id_joueur4 = J4.id_joueur
              INNER JOIN se_deroule2 SD ON SD.id_Match = R.id_Match
              INNER JOIN court C ON C.id_court = R.id_court
              INNER JOIN horaire H ON H.id_Horaire = SD.id_Horaire INNER JOIN tournoi T ON T.id_tournoi = R.id_tournoi
              WHERE J1.id_joueur < J2.id_joueur AND J3.id_joueur < J4.id_joueur AND T.categorie_tournoi LIKE 'Double' AND id_joueur1 = $IdJoueur
              AND R.id_match NOT IN (SELECT id_match FROM balle_set)
              UNION
              SELECT DISTINCT R.type_match, R.libelle_match,C.libelle_court, H.date_, SD.libelle_horaire, H.heure_debut, J1.nom_equipe AS nom_equipe1, J1.nom_joueur AS nom_joueur1,
              J1.prenom_joueur AS prenom_joueur1, J2.nom_joueur AS nom_joueur2, J2.prenom_joueur AS prenom_joueur2, J2.nom_equipe AS nom_equipe2, J3.nom_joueur AS nom_joueur3, J3.prenom_joueur AS prenom_joueur3,J4.nom_joueur AS nom_joueur4, J4.prenom_joueur AS prenom_joueur4,T.categorie_tournoi, T.type_tournoi
              FROM rencontre R
              INNER JOIN joueur J1 on R.id_joueur1 = J1.id_joueur OR R.id_joueur2 = J1.id_joueur AND R.id_joueur3 = J1.id_joueur AND R.id_joueur4 = J1.id_joueur
              INNER JOIN joueur J2 on R.id_joueur1 = J2.id_joueur OR R.id_joueur2 = J2.id_joueur
              INNER JOIN joueur J3 on R.id_joueur3 = J3.id_joueur OR R.id_joueur3 = J3.id_joueur
              INNER JOIN joueur J4 on R.id_joueur3 = J4.id_joueur OR R.id_joueur4 = J4.id_joueur
              INNER JOIN se_deroule2 SD ON SD.id_Match = R.id_Match
              INNER JOIN court C ON C.id_court = R.id_court
              INNER JOIN horaire H ON H.id_Horaire = SD.id_Horaire INNER JOIN tournoi T ON T.id_tournoi = R.id_tournoi
              WHERE J1.id_joueur < J2.id_joueur AND J3.id_joueur < J4.id_joueur AND T.categorie_tournoi LIKE 'Double' AND id_joueur2 = $IdJoueur
              AND R.id_match NOT IN (SELECT id_match FROM balle_set)
              UNION
              SELECT DISTINCT R.type_match, R.libelle_match,C.libelle_court, H.date_, SD.libelle_horaire, H.heure_debut, J1.nom_equipe AS nom_equipe1, J1.nom_joueur AS nom_joueur1,
              J1.prenom_joueur AS prenom_joueur1, J2.nom_joueur AS nom_joueur2, J2.prenom_joueur AS prenom_joueur2, J2.nom_equipe AS nom_equipe2, J3.nom_joueur AS nom_joueur3, J3.prenom_joueur AS prenom_joueur3,J4.nom_joueur AS nom_joueur4, J4.prenom_joueur AS prenom_joueur4,T.categorie_tournoi, T.type_tournoi
              FROM rencontre R
              INNER JOIN joueur J1 on R.id_joueur1 = J1.id_joueur OR R.id_joueur2 = J1.id_joueur AND R.id_joueur3 = J1.id_joueur AND R.id_joueur4 = J1.id_joueur
              INNER JOIN joueur J2 on R.id_joueur1 = J2.id_joueur OR R.id_joueur2 = J2.id_joueur
              INNER JOIN joueur J3 on R.id_joueur3 = J3.id_joueur OR R.id_joueur3 = J3.id_joueur
              INNER JOIN joueur J4 on R.id_joueur3 = J4.id_joueur OR R.id_joueur4 = J4.id_joueur
              INNER JOIN se_deroule2 SD ON SD.id_Match = R.id_Match
              INNER JOIN court C ON C.id_court = R.id_court
              INNER JOIN horaire H ON H.id_Horaire = SD.id_Horaire INNER JOIN tournoi T ON T.id_tournoi = R.id_tournoi
              WHERE J1.id_joueur < J2.id_joueur AND J3.id_joueur < J4.id_joueur AND T.categorie_tournoi LIKE 'Double' AND id_joueur3 = $IdJoueur
              AND R.id_match NOT IN (SELECT id_match FROM balle_set)
              UNION
              SELECT DISTINCT R.type_match, R.libelle_match,C.libelle_court, H.date_, SD.libelle_horaire, H.heure_debut, J1.nom_equipe AS nom_equipe1, J1.nom_joueur AS nom_joueur1,
              J1.prenom_joueur AS prenom_joueur1, J2.nom_joueur AS nom_joueur2, J2.prenom_joueur AS prenom_joueur2, J2.nom_equipe AS nom_equipe2, J3.nom_joueur AS nom_joueur3, J3.prenom_joueur AS prenom_joueur3,J4.nom_joueur AS nom_joueur4, J4.prenom_joueur AS prenom_joueur4,T.categorie_tournoi, T.type_tournoi
              FROM rencontre R
              INNER JOIN joueur J1 on R.id_joueur1 = J1.id_joueur OR R.id_joueur2 = J1.id_joueur AND R.id_joueur3 = J1.id_joueur AND R.id_joueur4 = J1.id_joueur
              INNER JOIN joueur J2 on R.id_joueur1 = J2.id_joueur OR R.id_joueur2 = J2.id_joueur
              INNER JOIN joueur J3 on R.id_joueur3 = J3.id_joueur OR R.id_joueur3 = J3.id_joueur
              INNER JOIN joueur J4 on R.id_joueur3 = J4.id_joueur OR R.id_joueur4 = J4.id_joueur
              INNER JOIN se_deroule2 SD ON SD.id_Match = R.id_Match
              INNER JOIN court C ON C.id_court = R.id_court
              INNER JOIN horaire H ON H.id_Horaire = SD.id_Horaire INNER JOIN tournoi T ON T.id_tournoi = R.id_tournoi
              WHERE J1.id_joueur < J2.id_joueur AND J3.id_joueur < J4.id_joueur AND T.categorie_tournoi LIKE 'Double' AND id_joueur4 = $IdJoueur
              AND R.id_match NOT IN (SELECT id_match FROM balle_set)";

     $sth = $this->db->query($req);
     $res = $sth->fetchAll(PDO::FETCH_ASSOC);
     return $res;
   }

   //Méthode qui permet d'obtenir tout les matchs Simple d'un joueurs passé en paramètre
   //Elle retourne un tableau associatif avec les informations de ces matchs
   function getMonPlanningSimple($IdJoueur) {
     $req = "SELECT DISTINCT R.type_match, R.libelle_match,C.libelle_court, H.date_, SD.libelle_horaire, H.heure_debut, J1.nom_equipe AS nom_equipe1, J1.nom_joueur AS nom_joueur1,
            J1.prenom_joueur AS prenom_joueur1, J2.nom_equipe AS nom_equipe2, J2.nom_joueur AS nom_joueur2, J2.prenom_joueur AS prenom_joueur2,T.categorie_tournoi, T.type_tournoi
            FROM rencontre R
            INNER JOIN joueur J1 on R.id_joueur1 = J1.id_joueur OR R.id_joueur2 = J1.id_joueur
            INNER JOIN joueur J2 on R.id_joueur1 = J2.id_joueur OR R.id_joueur2 = J2.id_joueur
            INNER JOIN se_deroule2 SD ON SD.id_Match = R.id_Match
            INNER JOIN court C ON C.id_court = R.id_court
            INNER JOIN horaire H ON H.id_Horaire = SD.id_Horaire INNER JOIN tournoi T ON T.id_tournoi = R.id_tournoi
            WHERE J1.id_joueur < J2.id_joueur AND T.categorie_tournoi LIKE 'Simple' AND id_joueur1 = $IdJoueur
            AND R.id_match NOT IN (SELECT id_match FROM balle_set)

            UNION

            SELECT DISTINCT R.type_match, R.libelle_match,C.libelle_court, H.date_, SD.libelle_horaire, H.heure_debut, J1.nom_equipe AS nom_equipe1, J1.nom_joueur AS nom_joueur1,
            J1.prenom_joueur AS prenom_joueur1, J2.nom_equipe AS nom_equipe2, J2.nom_joueur AS nom_joueur2, J2.prenom_joueur AS prenom_joueur2,T.categorie_tournoi, T.type_tournoi
            FROM rencontre R
            INNER JOIN joueur J1 on R.id_joueur1 = J1.id_joueur OR R.id_joueur2 = J1.id_joueur
            INNER JOIN joueur J2 on R.id_joueur1 = J2.id_joueur OR R.id_joueur2 = J2.id_joueur
            INNER JOIN se_deroule2 SD ON SD.id_Match = R.id_Match
            INNER JOIN court C ON C.id_court = R.id_court
            INNER JOIN horaire H ON H.id_Horaire = SD.id_Horaire INNER JOIN tournoi T ON T.id_tournoi = R.id_tournoi
            WHERE J1.id_joueur < J2.id_joueur AND T.categorie_tournoi LIKE 'Simple' AND id_joueur2 = $IdJoueur
            AND R.id_match NOT IN (SELECT id_match FROM balle_set)";
       $sth = $this->db->query($req);
       $res = $sth->fetchAll(PDO::FETCH_ASSOC);
       return $res;
   }

   //Méthode qui permet d'obtenir tout les matchs d'un joueur selon la catégorie des matchs du joueur passé en paramètre
   //Elle retourne un tableau associatif avec les informations de ces matchs
   function getCategorie($IdJoueur) {
     $req = "SELECT R.id_Match, R.id_joueur1, R.id_joueur2, R.id_joueur3, R.id_joueur4, T.categorie_tournoi
        FROM rencontre R
        INNER JOIN tournoi T ON T.id_Tournoi = R.id_Tournoi
        WHERE R.id_joueur1 = $IdJoueur AND R.id_match NOT IN (SELECT id_match FROM balle_set)
        UNION
        SELECT R.id_Match, R.id_joueur1, R.id_joueur2, R.id_joueur3, R.id_joueur4, T.categorie_tournoi
        FROM rencontre R
        INNER JOIN tournoi T ON T.id_Tournoi = R.id_Tournoi
        WHERE R.id_joueur2 = $IdJoueur AND R.id_match NOT IN (SELECT id_match FROM balle_set)
        UNION
        SELECT R.id_Match, R.id_joueur1, R.id_joueur2, R.id_joueur3, R.id_joueur4, T.categorie_tournoi
        FROM rencontre R
        INNER JOIN tournoi T ON T.id_Tournoi = R.id_Tournoi
        WHERE R.id_joueur3 = $IdJoueur AND R.id_match NOT IN (SELECT id_match FROM balle_set)
        UNION
        SELECT R.id_Match, R.id_joueur1, R.id_joueur2, R.id_joueur3, R.id_joueur4, T.categorie_tournoi
        FROM rencontre R
        INNER JOIN tournoi T ON T.id_Tournoi = R.id_Tournoi
        WHERE R.id_joueur4 = $IdJoueur AND R.id_match NOT IN (SELECT id_match FROM balle_set)";
       $sth = $this->db->query($req);
       $res = $sth->fetchAll(PDO::FETCH_ASSOC);

       if ($res == null) {
         $result = null;
       }elseif ($res[0]['categorie_tournoi'] == 'Simple') {
         $result = $this->getMonPlanningSimple($IdJoueur);
       }
       elseif($res[0]['categorie_tournoi'] == 'Double') {
         $result = $this->getMonPlanningDouble($IdJoueur);
       }

     return $result;
   }


	}

    ?>
