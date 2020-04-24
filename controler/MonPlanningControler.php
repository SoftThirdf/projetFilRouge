<?php
session_start();

include_once("../model/DAO.class.php");
$tab = $dao->getMatchSimple();

if (isset($_SESSION['id']))
{
include_once('../view/MonPlanning.php');
}
else {
include_once('../view/MonCompte.php');
}


for ($i=0; $i <sizeof($tab) ; $i++)
{
  $match = $tab[$i]['id_Match'];
}


?>
