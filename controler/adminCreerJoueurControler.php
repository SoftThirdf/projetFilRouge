<?php

include_once("../model/DAO.class.php");


if (isset($_POST['nom_joueur'])&& isset($_POST['prenom_joueur']) && isset($_POST['nationalite_joueur']) && isset($_POST['age_joueur']) && isset($_POST['nom_equipe']) && isset($_POST['login']) && isset($_POST['mdp'])) {

  $nomJoueur =$_POST['nom_joueur'];
  $prenomJoueur = $_POST['prenom_joueur'];
  $nationaliteJoueur = $_POST['nationalite_joueur'];
  $ageJoueur = $_POST['age_joueur'];
  $nomEquipe = $_POST['nom_equipe'];
  $login = $_POST['login'];
  $mdp = $_POST['mdp'];

  $reponseDaoInsert = $dao->insertJoueur($nomJoueur,$prenomJoueur,$nationaliteJoueur,$ageJoueur,$nomEquipe,$login,$mdp);

  if ($reponseDaoInsert) {
    echo "
      <script>
        alert(\"Le joueur a correctement été ajouté !\");
      </script>
    ";
  }else{
    echo "
      <script>
        alert(\"Une erreur est survenue, veuillez vérifier les champs choisis !\");
      </script>
  ";
  }

  include("../view/adminCreerJoueur.php");


}else{
  $tabNationalite = array();
  if($dossier = opendir('../view/img/pays'))
  {
    while(($fichier = readdir($dossier)))
    {
      $nomFichier = explode('.',$fichier)[0];
      if (!(strlen($nomFichier)==0)) {
        array_push($tabNationalite,$nomFichier);
      }
    }
  }

  include("../view/adminCreerJoueur.php");
}













 ?>
