<?php
  session_start();

  include_once("../model/DAO.class.php");

  $idJoueur = $_SESSION['id'];
  $tabReservations = $dao->getReservations($idJoueur);

  if (isset($_POST['date']) && isset($_POST['heure_debut']) && isset($_POST['heure_fin']) && isset($_POST['court'])) {
    $date = $_POST['date'];
    $heure_debut = $_POST['heure_debut'];
    $heure_fin = $_POST['heure_fin'];
    $court = $_POST['court'];

    $resultInsert = $dao->insertReservation($idJoueur, $date, $heure_debut, $heure_fin, $court);

    if ($resultInsert == null) {
      echo"<script>
        alert(\"Une erreur est survenue, veuillez vérifier que vous n'avez pas déjà un match où une réservation à ces horaires !\");
      </script>";
    }else{
      echo"<script>
        alert(\"Le court a bien été reservé !\");        
      </script>";
    }

  }elseif (isset($_POST['dateR']) && isset($_POST['heure_debutR']) && isset($_POST['heure_finR'])) {
    $date = $_POST['dateR'];
    $heure_debut = $_POST['heure_debutR'];
    $heure_fin = $_POST['heure_finR'];

    $tab = $dao->getCourtsDispo($date,$heure_debut,$heure_fin);
    echo json_encode($tab);
    die();
  }

  include("../view/reserverCourt.php");

?>
