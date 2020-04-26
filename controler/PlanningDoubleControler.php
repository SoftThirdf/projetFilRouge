<?php
  session_start();

  include_once("../model/DAO.class.php");

  $tab = $dao->getPlanD();

  include("../view/PlanningDouble.php");

?>