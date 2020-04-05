<?php

  include_once("../model/DAO.class.php");

  if (isset($_POST['login']) && isset($_POST['mdp']))
  {
    $Login=$_POST['login'];
    $Mdp=$_POST['mdp'];
    $tab = $dao->getUtilisateur($Login, $Mdp);

    if(!empty($tab))
    {
      include('../view/Moncompte.php');
    }else
    {
      $echec = "Echec de la connexion, veuillez réessayer";
      include('../view/Forconnexion.php');
    }
  }else{
    include('../view/Forconnexion.php');
  }

?>
