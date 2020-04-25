<?php
  session_start();

  include_once("../model/DAO.class.php");

  $idJoueur = $_SESSION['id'];

  include("../view/reserverCourt.php");

?>
