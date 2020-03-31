<?php

  include_once("../model/DAO.class.php");
  $tabTournois = $dao->getTournois();
  $tabCourts = $dao->getCourts();
  $tabJoueurs = $dao->getJoueurs();
  include("../view/admin.php")


 ?>
