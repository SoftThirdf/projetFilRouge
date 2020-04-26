<?php

session_start();

include_once("../model/DAO.class.php");

if (isset($_SESSION['id'])) {

  $IdJoueur = $_SESSION['id'];
  $tab = $dao->getMonPlanningSimple($IdJoueur);

  include('../view/MonPlanningDouble.php');

}

else {
  include('../view/MonCompte.php');
}


?>
