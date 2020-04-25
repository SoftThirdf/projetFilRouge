<?php

  session_start();
  include_once("../model/DAO.class.php");
  
  if (isset($_GET['idVIP'])){
    $idVIP = $_GET['idVIP'];
    $tab = $dao->getInfoVIP($idVIP);
  }
  else {
    $tab = null;
  }

  include("../view/profilVIP.php");

?>
