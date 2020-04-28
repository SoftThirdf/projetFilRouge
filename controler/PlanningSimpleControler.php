<?php
  session_start();

  include_once("../model/DAO.class.php");

  $tab = $dao->getPlanS();

  include("../view/PlanningSimple.php");

?>