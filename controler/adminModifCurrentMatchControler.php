<?php
session_start();

  include_once("../model/DAO.class.php");

  if (isset($_POST['id_joueur']) && isset($_POST['id_Match'])) {
    $id_joueur = $_POST['id_joueur'];
    $id_match = $_POST['id_Match'];
    $reponseDaoInsert = $dao->insertJeu($id_joueur,$id_match,30);
    echo $reponseDaoInsert;

  }elseif (isset($_POST['id_Match']) && isset($_POST['termine'])) {
    $id_match = $_POST['id_Match'];
    $reponseDaoInsert = $dao->termineMatch($id_match);
    echo $reponseDaoInsert;

  }elseif (isset($_POST['id_Match']) && !isset($_POST['id_joueur'])) {
    $id_match = $_POST['id_Match'];
    $reponseDaoInsert = $dao->insertSet($id_match,30);
    echo $reponseDaoInsert;
  }

  $tabMatchsDoubleEnCours = $dao->matchsDoubleEnCours();
  $tabMatchsSimpleEnCours = $dao->matchsSimpleEnCours();

  include("../view/adminModifCurrentMatch.php");
 ?>
