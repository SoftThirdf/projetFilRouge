<?php
session_start();

include_once("../model/DAO.class.php");

$tab = $dao->getMatchSimple();


if (isset($_SESSION['id'])) {
  for ($i=0; $i <sizeof($tab) ; $i++) {
   $match['id'] = $tab[$_SESSION['id']]['id_Match'];
   $match['court'] = $tab[i]['libelle_court'];
   $match['jour'] = $tab[i]['heure_debut'];
   $match['libelle'] = $tab[i]['libelle_match'];
   $match['type'] = $tab[i]['type_match'];
   include_once('../view/MonPlanning.php');
  }
}
else {
 include_once('../view/MonCompte.php');
}

?>

<?php
  // session_start();
  // include_once("../model/DAO.class.php");
  //
  // if (isset($_POST['login']) && isset($_POST['mdp']))
  // {
  //   $Login=$_POST['login'];
  //   $Mdp=$_POST['mdp'];
  //   $_SESSION['login']=$Login;
  //   $tab = $dao->getUtilisateur($Login, $Mdp);
  //   if(!empty($tab))
  //   {
  //     $_SESSION['id']=$tab[0]['id_joueur'];
  //     $_SESSION['nom']=$tab[0]['nom_joueur'];
  //     $_SESSION['prenom']=$tab[0]['prenom_joueur'];
  //     $_SESSION['equipe']=$tab[0]['nom_equipe'];
  //     $_SESSION['nationalite']=$tab[0]['nationalite_joueur'];
  //
  //     include('../view/MonCompte.php');
  //   }else
  //   {
  //     $echec = "Echec de la connexion, veuillez réessayer";
  //     include('../view/Forconnexion.php');
  //   }
  // }else{
  //   include('../view/Forconnexion.php');
  // }

?>
