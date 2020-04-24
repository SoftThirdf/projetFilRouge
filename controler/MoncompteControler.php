<?php
  session_start();
  include_once("../model/DAO.class.php");

  if (isset($_POST['login']) && isset($_POST['mdp']))
  {
    $Login=$_POST['login'];
    $Mdp=$_POST['mdp'];
    $_SESSION['login']=$Login;
    $tab = $dao->getUtilisateur($Login, $Mdp);
    if(!empty($tab))
    {
      $_SESSION['id']=$tab[0]['id_joueur'];
      $_SESSION['nom']=$tab[0]['nom_joueur'];
      $_SESSION['prenom']=$tab[0]['prenom_joueur'];
      $_SESSION['equipe']=$tab[0]['nom_equipe'];
      $_SESSION['nationalite']=$tab[0]['nationalite_joueur'];

      include('../view/MonCompte.php');
    }elseif ($Login == "admin" && $Mdp == "admin") {
      $_SESSION['admin']=true;
      header('Location: adminCreerMatchControler.php');
    }else
    {
      $echec = "Echec de la connexion, veuillez réessayer";
      include('../view/Forconnexion.php');
    }
  }elseif(isset($_SESSION['id'])){
    include('../view/MonCompte.php');
  }else{
    include('../view/Forconnexion.php');
  }

?>
