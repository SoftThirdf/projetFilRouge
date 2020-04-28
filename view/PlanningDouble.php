<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../view/style/index.css">
  <link rel="stylesheet" href="../view/style/Planning.css">
  <title>Accueil</title>
</head>

<body>
  <?php
if (isset($_SESSION['id']))
{
  include_once('../view/headerlog.php');
}
else {
  include_once('../view/headernotlog.php');
}
  ?>


<div id="info">
<h2> Tournoi double qualificatif - 1/8 </h2>
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
		$nomjoueur3 = $match['nom_joueur3'];
		$prenomjoueur3 = $match['prenom_joueur3'];
		$nomequipe3 = $match['nom_equipe3'];
		$nomjoueur4 = $match['nom_joueur4'];
		$prenomjoueur4 = $match['prenom_joueur4'];
		$nomequipe4 = $match['nom_equipe4'];
		
		
      ?>


 <div id="conteneurplanning">
   <div class="equipe1">
     <?php echo $match['nom_joueur1'] . " " . $match['prenom_joueur1'] . "<br>"; ?>
     <?php echo $match['nom_joueur2'] . " " . $match['prenom_joueur2'] . "<br>"; ?>
     <?php echo $match['nom_equipe2']; ?>
   </div>

   <div class="infostournoi">
     <?php echo "Match n°" . $match['id_Match'] . "<br>"; ?>
     Court :
     <?php echo $match['libelle_court'] . "<br>"; ?>
     Heure :
     <?php echo $match['heure_debut']; ?>
   </div>

   <div class="equipe2">
     <?php echo $match['nom_joueur3'] . " " . $match['prenom_joueur3'] . "<br>"; ?>
     <?php echo $match['nom_joueur4'] . " " . $match['prenom_joueur4'] . "<br>"; ?>
     <?php echo $match['nom_equipe3']; ?>
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
	  <li class="marginBottom10"><a href="stands/StandMenu.html" class="linkWhite">Stands de l'open</a></li>
      <li class="marginBottom10"><a href="ListeVIP.php" class="linkWhite">VIP</a></li>

      </ol>
      <ol class="navigationFooterOl">
        <li class="marginBottom10"><a href="contact.php" class="linkWhite">Infos Pratiques et Contact</a></li>
      <li class="marginBottom10"><a href="../controler/MoncompteControler.php" class="linkWhite">Se connecter</a></li>
      <li class="marginBottom10"><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

      </ol>
    </nav>
    <!-- </div> -->

</footer>
