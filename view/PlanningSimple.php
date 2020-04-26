<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../view/style/Planning.css">
  <link rel="stylesheet" href="../view/style/index.css">
  <title> Planning des matchs </title>
</head>

<body>
  <?php
  if (isset($_SESSION['id']))
  {
    include_once('../view/headerlog.php');
  }elseif (isset($_SESSION['admin'])) {
    include_once('../view/headerAdmin.php');
  }
  else {
    include_once('../view/headernotlog.php');
  }
  ?>

<div id="info">
<h2> Tournoi simple qualificatif - 1/8 </h2>
<hr class="sousH2">

<h3> 2020-06-14 </h3>
<hr class="sousH3">
</div>

<?php
        global $tab;

        if ($tab==null) {
          echo "Ok";
        }else {

        foreach ($tab as $key => $match) {

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
      ?>


 <div id="conteneurplanning">
   <div class="equipe1">
     <?php echo $match['nom_joueur1'] . " " . $match['prenom_joueur1'] . " " . $match['nom_equipe1']; ?>
   </div>

   <div class="infostournoi">
     <?php echo "Match n°" . $match['id_Match'] . "<br>"; ?>

     Court :
     <?php echo $match['libelle_court'] . "<br>"; ?>

     Heure :
     <?php echo $match['heure_debut']; ?>
   </div>

   <div class="equipe2">
     <?php echo $match['nom_joueur2'] . " " . $match['prenom_joueur2'] . " " . $match['nom_equipe2']; ?>
   </div>
 </div>


<?php
}
		}
?>


</body>

<footer>
    <div id="conteneurNavigationFooter">
      <a href="index.php" class="s100"><img src="../view/img/logoOpenFooter.png" alt="logoTournoi" id="logoOpenFooter" class="s100"></a>
    </div>
    <nav id="navigationFooter">
      <ol class="navigationFooterOl">
        <li class="marginBottom10"><a href="index.php" class="linkWhite">Accueil</a></li>
      <li class="marginBottom10"><a href="../controler/tournoisSimQuaControler.php" class="linkWhite">Tableaux des tournois</a></li>
	  <li class="marginBottom10"><a href="stands/StandMenu.php" class="linkWhite">Stands de l'open</a></li>
      <li class="marginBottom10"><a href="../controler/listeVIPControler.php" class="linkWhite">VIP</a></li>

      </ol>
      <ol class="navigationFooterOl">
        <li class="marginBottom10"><a href="contact.php" class="linkWhite">Infos Pratiques et Contact</a></li>
        <li class="marginBottom10"><a href="reseaux.php" class="linkWhite">Nos réseaux sociaux</a></li>
        <li class="marginBottom10"><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

      </ol>
    </nav>
    <!-- </div> -->

</footer>
