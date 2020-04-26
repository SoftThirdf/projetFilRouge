<?php
session_start();

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="../view/style/Moncompte1.css">
  <link type="text/css" rel="stylesheet" href="../view/style/infos.css">
  <link rel="stylesheet" href="../view/style/Planning.css">
  <title>Mon Planning</title>
</head>

<body>
  <?php
if (isset($_SESSION['id']))
{
  include_once('../view/headerlog.php');
}
else
{
  include_once('../view/headernotlog.php');
}

?>



<div id="info">
<h2> Mon planning </h2>
<hr class="sousH2">
</div>


<?php

global $tab2;

if ($tab2 == null) {
?>

  <div id="info">
    <?php echo "Vous n'avez aucun match prévu"; ?>
  </div>

<?php
}

else {

  foreach ($tab2 as $key => $match2) {

    if ($match2['categorie_tournoi'] == "Double") {

      $tab = $dao->getMonPlanningDouble($IdJoueur);

      if ($tab != null) {

      foreach($tab as $key => $match) {

        $id_match = $match['id_Match'];
        $typematch = $match['type_match'];
        $nomjoueur1 = $match['nom_joueur1'];
        $prenomjoueur1 = $match['prenom_joueur1'];
        $nomequipe1 = $match['nom_equipe1'];
        $libellecourt = $match['libelle_court'];
        $heuredebut = $match['heure_debut'];
        $nomjoueur2 = $match['nom_joueur2'];
        $prenomjoueur2 = $match['prenom_joueur2'];
        $nomequipe2 = $match['nom_equipe2'];
        $nomjoueur3 = $match['nom_joueur3'];
        $prenomjoueur3 = $match['prenom_joueur3'];
        $nomequipe3 = $match['nom_equipe3'];
        $nomjoueur4 = $match['nom_joueur4'];
        $prenomjoueur4 = $match['prenom_joueur4'];
        $nomequipe4 = $match['nom_equipe4'];
        $date = $match['date_'];
        $tournoi = $match['type_tournoi'];
        $categorie = $match['categorie_tournoi'];
        $type = $match['type_match'];
        $libelle = $match['libelle_match'];

?>

<div class="principale">

  <div id="info">
  <h3> <?php echo $date ?> </h3>
  <hr class="sousH3">
  </div>

  <div id="conteneurplanning">
    <div class="equipe1">
      <?php echo $nomjoueur1 . " " . $prenomjoueur1 . "<br>"; ?>
      <?php echo $nomjoueur2 . " " . $prenomjoueur2 . "<br>"; ?>
      <?php echo $nomequipe1; ?>
    </div>

    <div class="infostournoi">
      <?php echo $type . " " . $categorie . " " . $tournoi . " - " . $libelle . "<br>"; ?>
      <?php echo "Match n°" . $id_match . "<br>"; ?>
      Court : <?php echo $libellecourt . "<br>"; ?>
      Heure : <?php echo $heuredebut; ?>
    </div>

    <div class="equipe2">
      <?php echo $nomjoueur3 . " " . $prenomjoueur3 . "<br>"; ?>
      <?php echo $nomjoueur4 . " " . $prenomjoueur4 . "<br>"; ?>
      <?php echo $nomequipe3; ?>
    </div>
  </div>


</div>


<?php
}
}
}

else {

  $tab3 = $dao->getMonPlanningSimple($IdJoueur);

  if ($tab3 != null) {

  foreach($tab3 as $key => $match3) {

    $id_match = $match3['id_Match'];
    $typematch = $match3['type_match'];
    $nomjoueur1 = $match3['nom_joueur1'];
    $prenomjoueur1 = $match3['prenom_joueur1'];
    $nomequipe1 = $match3['nom_equipe1'];
    $libellecourt = $match3['libelle_court'];
    $heuredebut = $match3['heure_debut'];
    $nomjoueur2 = $match3['nom_joueur2'];
    $prenomjoueur2 = $match3['prenom_joueur2'];
    $nomequipe2 = $match3['nom_equipe2'];
    $date = $match3['date_'];
    $tournoi = $match3['type_tournoi'];
    $categorie = $match3['categorie_tournoi'];
    $type = $match3['type_match'];
    $libelle = $match3['libelle_match'];

?>

  <div id="info">
    <h3> <?php echo $date ?> </h3>
    <hr class="sousH3">
  </div>

  <div id="conteneurplanning">
    <div class="equipe1">
      <?php echo $nomjoueur1 . " " . $prenomjoueur1 . " " . $nomequipe1; ?>
    </div>

    <div class="infostournoi">
      <?php echo $type . " " . $categorie . " " . $tournoi . " - " . $libelle . "<br>"; ?>
      <?php echo "Match n°" . $id_match . "<br>"; ?>
      Court : <?php echo $libellecourt . "<br>"; ?>
      Heure : <?php echo $heuredebut; ?>
    </div>

    <div class="equipe2">
      <?php echo $nomjoueur2 . " " . $prenomjoueur2 . " " . $nomequipe2; ?>
    </div>
  </div>

<?php
}
}
}

}
}
?>


</body>

<footer>
  <div id="conteneurNavigationFooter">
    <a href="../view/index.php" class="s100"><img src="../view/img/logoOpenFooter.png" alt="logoTournoi" id="logoOpenFooter" class="s100"></a>
  </div>
  <nav id="navigationFooter">
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="index.php" class="linkWhite">Accueil</a></li>
      <li class="marginBottom10"><a href="../controler/tournoisSimQuaControler.php" class="linkWhite">Tableaux des tournois</a></li>
	  <li class="marginBottom10"><a href="stands/StandMenu.html" class="linkWhite">Stands de l'open</a></li>
      <li class="marginBottom10"><a href="ListeVIP.php" class="linkWhite">VIP</a></li>

    </ol>
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="contact.php" class="linkWhite">Infos Pratiques et Contact</a></li>
      <li class="marginBottom10"><a href="../controler/MoncompteControler.php" class="linkWhite">Se connecter</a></li>
      <li class="marginBottom10"><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>
  </div>


</footer>

</html>
