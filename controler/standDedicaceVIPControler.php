<?php
  session_start();

  include_once("../model/DAO.class.php");

  $nomVIP1 = "François";
  $prenomVIP1 ="Maxime";
  $nomVIP2 = "Michel";
  $prenomVIP2 = "Emeline";
  $nomVIP3 = "Gökdere";
  $prenomVIP3 = "Özge";

  $tab = $dao->getVIPDedicaces($nomVIP1, $prenomVIP1, $nomVIP2, $prenomVIP2, $nomVIP3, $prenomVIP3);

  include("../view/stands/StandDedicaceVIP.php");

?>
