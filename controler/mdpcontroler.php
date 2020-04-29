<?php
  session_start();
  include_once("../model/DAO.class.php");
  if (isset($_SESSION['login']))
  {
   if (isset($_POST['nouveaumdp'])&&isset($_POST['nouveaumdp2']))
   {
     $nouveaumdp=$_POST['nouveaumdp'];
     $nouveaumdp2=$_POST['nouveaumdp2'];
     if ($nouveaumdp!==$nouveaumdp2)
     {
       include_once('../view/mdperreur.php');
     }else
       {
        $Login=$_SESSION['login'];
        $tab1 = $dao->setMdp($Login,$nouveaumdp);
        include_once('../view/Motdepassemodifie.php');
       }
   }else {
     include('../view/mdp.php');
     //echo "Une erreur s'est produite";
   }
  }
?>
