<?php
  session_start();
  include_once("../model/DAO.class.php");
  $tab = $dao->getAllVIP();

  include("../view/listeVIP.php");
?>
