<?php

session_start();

include_once("../model/DAO.class.php");

if (isset($_SESSION['id'])) {

  $IdJoueur = $_SESSION['id'];
  $tab2 = $dao->getCategorie($IdJoueur);

  include_once('../view/MonPlanning.php');

}

else {
  include_once('../view/MonCompte.php');
}


?>
