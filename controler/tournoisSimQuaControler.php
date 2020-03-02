<?php

  include_once("../model/DAO.class.php");
  $typeTournoi = 'Eliminatoire';
  $categorieTournoi = 'Simple';
  $tab = $dao->getInfoTypeMatchTournoi($typeTournoi, $categorieTournoi);

  include("../view/tournoisSimQua.php")


 ?>
