<?php

  include_once("../model/DAO.class.php");
  $typeTournoi = 'Eliminatoire';
  $tab = $dao->getInfoTypeMatchTournoiDouble($typeTournoi);

  // Mise en forme du résultat de la requête pour avoir un tableau propre, du style :
  // Phase =>
  //        Match =>
  //              idEquipe =>
  //                      J1 =>
  //                          Nom,Prenom,Nationalité
  //                      J2 =>
  //                          Nom,Prenom,Nationalité
  //                      jeu1,jeu2,jeu3.....jeuN

  // array (size=8)
  //   'id_Match' => string '25' (length=2)
  //   'nom_equipe' => string 'ED007' (length=5)
  //   'id_joueur' => string '45' (length=2)
  //   'nom_joueur' => string 'Hung' (length=4)
  //   'prenom_joueur' => string 'Chan' (length=4)
  //   'Nationalite_joueur' => string 'CN' (length=2)
  //   'libelle_match' => string '1/16' (length=4)
  //   'Nb_jeu' => string '4' (length=1)

  if (empty($tab)) {
    $tabFinal = null;
  }else{
    $tabFinal ;
    $idMatch = '';
    $idJoueur = '';
    $idEquipe = '';
    $phase = '';

    for ($i=0; $i <sizeof($tab) ; $i++) {
      if ($phase != $tab[$i]['libelle_match']) {
        $phase = $tab[$i]['libelle_match'];
      }
      if ($idMatch != $tab[$i]['id_Match']) {
        $idMatch = $tab[$i]['id_Match'];
      }
      if ($idEquipe != $tab[$i]['nom_equipe']) {
        $idEquipe = $tab[$i]['nom_equipe'];
      }
      if ($idJoueur != $tab[$i]['id_joueur']) {
        $idJoueur = $tab[$i]['id_joueur'];
        $ah = array($tab[$i]['nom_joueur'],$tab[$i]['prenom_joueur'],$tab[$i]['Nationalite_joueur']);
        $tabFinal[$phase][$idMatch][$idEquipe][$idJoueur]= $ah;
        array_push($tabFinal[$phase][$idMatch][$idEquipe][$idJoueur], $tab[$i]['Nb_jeu']);
      }else{
        array_push($tabFinal[$phase][$idMatch][$idEquipe][$idJoueur], $tab[$i]['Nb_jeu']);
      }
    }
}

  // for($i = 3; $i < sizeof($tabFinal['1/8']['SQ022']['ED033']['J033']); $i++ ) {
  //   $nb = $tabFinal['1/8']['SQ022']['ED033']['J033'][$i];
  //   for ($k=3; $k < sizeof($tabFinal['1/8']['SQ022']['ED033']['J050']); $k++) {
  //     $nb = $nb + $tabFinal['1/8']['SQ022']['ED033']['J050'][$k];
  //   }
  //   var_dump($nb);
  // }

  include("../view/tournoisDouQua.php")
 ?>
