<?php
  session_start();

  include_once("../model/DAO.class.php");

  if (isset($_POST['type_match']) && isset($_POST['libelle_match']) && isset($_POST['id_court']) && isset($_POST['id_Tournoi'])&& isset($_POST['categorieMatch'])&& isset($_POST['id_joueur1'])&& isset($_POST['id_joueur2']) &&
  isset($_POST['id_erb1']) && isset($_POST['id_erb2']) && isset($_POST['id_arbitre1'])&& isset($_POST['id_arbitre2'])&& isset($_POST['id_arbitre3'])&& isset($_POST['id_arbitre4'])&&
  isset($_POST['id_arbitre5'])&& isset($_POST['id_arbitre6'])&& isset($_POST['id_arbitre7'])&& isset($_POST['id_arbitre8'])&& isset($_POST['id_arbitre9'])&& isset($_POST['id_arbitre10']) &&
  isset($_POST['date']) && isset($_POST['horaire'])) {
    $idJoueur1 = $_POST['id_joueur1'];
    $idJoueur2 = $_POST['id_joueur2'];

    $idCourt = $_POST['id_court'];
    $idTournoi = $_POST['id_Tournoi'];
    $typeMatch = $_POST['type_match'];
    $libelle_match = $_POST['libelle_match'];
    $categorieMatch = $_POST['categorieMatch'];
    $idErb1 = $_POST['id_erb1'];
    $idErb2 = $_POST['id_erb2'];
    $idArbitre1 = $_POST['id_arbitre1'];
    $idArbitre2 = $_POST['id_arbitre2'];
    $idArbitre3 = $_POST['id_arbitre3'];
    $idArbitre4 = $_POST['id_arbitre4'];
    $idArbitre5 = $_POST['id_arbitre5'];
    $idArbitre6 = $_POST['id_arbitre6'];
    $idArbitre7 = $_POST['id_arbitre7'];
    $idArbitre8 = $_POST['id_arbitre8'];
    $idArbitre9 = $_POST['id_arbitre9'];
    $idArbitre10 = $_POST['id_arbitre10'];
    $date = $_POST['date'];
    $horaire = $_POST['horaire'];


    if ($categorieMatch =="simple") {
      $reponseDaoInsert = $dao->insertRencontre($typeMatch, "null", $libelle_match, $idCourt, $idTournoi, $idJoueur1, $idJoueur2, "null", "null", $idErb1, $idErb2, $idArbitre1,$idArbitre2,$idArbitre3,$idArbitre4,$idArbitre5,$idArbitre6,$idArbitre7,$idArbitre8,$idArbitre9,$idArbitre10,$categorieMatch, $date, $horaire);
    }elseif ($categorieMatch =="double" && isset($_POST['id_joueur3']) && isset($_POST['id_joueur4'])){
      $idJoueur3 = $_POST['id_joueur3'];
      $idJoueur4 = $_POST['id_joueur4'];
      $reponseDaoInsert = $dao->insertRencontre($typeMatch, "null", $libelle_match, $idCourt, $idTournoi, $idJoueur1, $idJoueur2, $idJoueur3, $idJoueur4, $idErb1, $idErb2, $idArbitre1,$idArbitre2,$idArbitre3,$idArbitre4,$idArbitre5,$idArbitre6,$idArbitre7,$idArbitre8,$idArbitre9,$idArbitre10,$categorieMatch, $date, $horaire);
    }

    if ($reponseDaoInsert) {
      echo "
        <script>
          alert(\"Le match a correctement été ajouté !\");
        </script>
      ";
    }else{
      echo "
        <script>
          alert(\"Une erreur est survenue, veuillez vérifier les champs choisis !\");
        </script>
    ";
    }
    $tabTournois = $dao->getTournois();
    $tabCourts = $dao->getCourts();
    $tabJoueurs = $dao->getJoueurs();
    $tabErbs = $dao->getErbs();
    $tabArbitres = $dao->getArbitres();
    include("../view/adminCreerMatch.php");


  }elseif (isset($_POST['id_erb'])) {
    $idErb = $_POST['id_erb'];
    $tabErbsRestant = $dao->getErbsExcept1($idErb);
    echo json_encode($tabErbsRestant);

  }elseif(isset($_POST['id_joueur1']) && isset($_POST['id_joueur2']) && isset($_POST['id_joueur3'])){
    $idJoueur1 = $_POST['id_joueur1'] ;
    $idJoueur2 = $_POST['id_joueur2'] ;
    $idJoueur3 = $_POST['id_joueur3'] ;
    $tabJoueursRestant = $dao->getJoueursExcept3($idJoueur1, $idJoueur2, $idJoueur3);
    echo json_encode($tabJoueursRestant);

  }elseif(isset($_POST['id_joueur1']) && isset($_POST['id_joueur2'])){
    $idJoueur1 = $_POST['id_joueur1'] ;
    $idJoueur2 = $_POST['id_joueur2'] ;
    $tabJoueursRestant = $dao->getJoueursExcept2($idJoueur1, $idJoueur2);
    echo json_encode($tabJoueursRestant);

  }elseif(isset($_POST['id_joueur1'])){
    $idJoueur1 = $_POST['id_joueur1'] ;
    $tabJoueursRestant = $dao->getJoueursExcept($idJoueur1);
    echo json_encode($tabJoueursRestant);

  }else{
    $tabTournois = $dao->getTournois();
    $tabCourts = $dao->getCourts();
    $tabJoueurs = $dao->getJoueurs();
    $tabErbs = $dao->getErbs();
    $tabArbitres = $dao->getArbitres();

    include("../view/adminCreerMatch.php");
  }

 ?>
