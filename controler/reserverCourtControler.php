<?php
  session_start();

  include_once("../model/DAO.class.php");

  $idJoueur = $_SESSION['id'];
  $tabReservations = $dao->getReservations($idJoueur);

  include("../view/reserverCourt.php");

?>
