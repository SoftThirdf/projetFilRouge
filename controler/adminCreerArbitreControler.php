<?php
session_start();

include_once("../model/DAO.class.php");

if (isset($_POST['type_arbitre']) && isset($_POST['categorie_arbitre']) && isset($_POST['nom_arbitre'])&& isset($_POST['prenom_arbitre'])&& isset($_POST['nationalite_arbitre'])&& isset($_POST['telephone_arbitre'])) {

  $typeArbitre = ($_POST['type_arbitre']);
  $categorieArbitre = $_POST['categorie_arbitre'];
  $nomArbitre = $_POST['nom_arbitre'];
  $prenomArbitre = $_POST['prenom_arbitre'];
  $nationaliteArbitre = $_POST['nationalite_arbitre'];
  $telephoneArbitre = $_POST['telephone_arbitre'];

  $reponseDaoInsert = $dao->insertArbitre($typeArbitre,$categorieArbitre,$nomArbitre,$prenomArbitre,$nationaliteArbitre,$telephoneArbitre);

  if ($reponseDaoInsert) {
    echo "
      <script>
        alert(\"L'arbitre a correctement été ajouté !\");
      </script>
    ";
  }else{
    echo "
      <script>
        alert(\"Une erreur est survenue, veuillez vérifier les champs choisis !\");
      </script>
  ";
  }

  include("../view/adminCreerArbitre.php");

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

  include("../view/adminCreerArbitre.php");
}

 ?>
