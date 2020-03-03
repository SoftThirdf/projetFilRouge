<?php

  include_once("../model/DAO.class.php");
  $typeTournoi = 'Officiel';
  $categorieTournoi = 'Simple';
  $tab = $dao->getInfoTypeMatchTournoi($typeTournoi, $categorieTournoi);

  // Mise en forme du résultat de la requête pour avoir un tableau propre, du style :
  // Phase =>
  //        Match =>
  //              J1 =>
  //                  Nom,Prenom,Nationalité,jeu1,jeu2,jeu3.....jeuN
  //              J2 =>
  //                  Nom,Prenom,Nationalité,jeu1,jeu2,jeu3.....jeuN


  if (empty($tab)) {
    $tabFinal = null;
  }else{
    $tabFinal ;
    $tabScore = [];
    $idMatch = '';
    $idJoueur = '';
    $phase = '';

    for ($i=0; $i <sizeof($tab) ; $i++) {
      if ($phase != $tab[$i]['libelle_match']) {
        $phase = $tab[$i]['libelle_match'];
      }
      if ($idMatch != $tab[$i]['id_Match']) {
        $idMatch = $tab[$i]['id_Match'];
      }
      if ($idJoueur != $tab[$i]['id_joueur']) {
        $idJoueur = $tab[$i]['id_joueur'];
        $ah = array($tab[$i]['Nom_joueur'],$tab[$i]['Prenom_joueur'],$tab[$i]['Nationalite_joueur'], $tab[$i]['Nb_jeu_simple']);
        $tabFinal[$phase][$idMatch][$idJoueur]= $ah;
      }else{
        array_push($tabFinal[$phase][$idMatch][$idJoueur], $tab[$i]['Nb_jeu_simple']);
      }
    }
}

  include("../view/tournoisSimFin.php")
 ?>
