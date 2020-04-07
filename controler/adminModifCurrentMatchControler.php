<?php

  include_once("../model/DAO.class.php");

  if (isset($_POST['id_joueur']) && isset($_POST['id_Match'])) {
    $id_joueur = $_POST['id_joueur'];
    $id_match = $_POST['id_Match'];
    $reponseDaoInsert = $dao->insertBalleSet($id_joueur,$id_match,30);

    echo $reponseDaoInsert;
  }else{

  }

  $tabMatchsDoubleEnCours = $dao->matchsDoubleEnCours();
  $tabMatchsSimpleEnCours = $dao->matchsSimpleEnCours();

  include("../view/adminModifCurrentMatch.php");
 ?>
