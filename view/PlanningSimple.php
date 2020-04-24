<?php
  session_start();

  try {
    $bdd = new PDO('mysql:host=localhost;dbname=testdb;charset=utf8', 'root', 'root');
  }
  catch (Exception $e) {
    die ("Erreur : " . $e -> getMessage());
  }

  $reponse = $bdd -> query ("SELECT DISTINCT R.id_Match, R.type_match, R.libelle_match, C.id_court,  C.libelle_court, H.id_horaire, H.date_, SD.libelle_horaire, H.heure_debut, J1.id_joueur, J1.nom_joueur AS nom_joueur1, J1.prenom_joueur AS prenom_joueur1, J1.nom_equipe AS nom_equipe1, J2.id_joueur, J2.nom_joueur AS nom_joueur2, J2.prenom_joueur AS prenom_joueur2, J2.nom_equipe AS nom_equipe2, T.categorie_tournoi, T.type_tournoi FROM rencontre R  INNER JOIN joueur J1 on R.id_joueur1 = J1.id_joueur OR R.id_joueur2 = J1.id_joueur  INNER JOIN joueur J2 on R.id_joueur1 = J2.id_joueur OR R.id_joueur2 = J2.id_joueur INNER JOIN se_deroule2 SD ON SD.id_Match = R.id_Match INNER JOIN court C ON C.id_court = R.id_court INNER JOIN horaire H ON H.id_Horaire = SD.id_Horaire INNER JOIN tournoi T ON T.id_tournoi = R.id_tournoi WHERE J1.id_joueur < J2.id_joueur AND T.categorie_tournoi LIKE 'simple' AND R.libelle_match LIKE '1/8' ORDER BY R.id_Match");

?>


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

while ($donnees = $reponse -> fetch()) {

?>

<!-- <div id="info">
  <h2> <?php //echo "Tournoi simple qualificatif - " . $donnees['libelle_match']; ?> </h2>
  <hr class="sousH2">
</div>

 <div id="info">
   <h3> <?php //echo $donnees['date_']; ?> </h3>
   <hr class="sousH3">
 </div> -->


 <div id="conteneurplanning">
   <div class="equipe1">
     <?php echo $donnees['nom_joueur1'] . " " . $donnees['prenom_joueur1'] . " " . $donnees['nom_equipe1']; ?>
   </div>

   <div class="infostournoi">
     <?php echo "Match n°" . $donnees['id_Match'] . "<br>"; ?>
     Court :
     <?php echo $donnees['libelle_court'] . "<br>"; ?>
     Heure :
     <?php echo $donnees['heure_debut']; ?>
   </div>

   <div class="equipe2">
     <?php echo $donnees['nom_joueur2'] . " " . $donnees['prenom_joueur2'] . " " . $donnees['nom_equipe2']; ?>
   </div>
 </div>


<?php
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
      <li class="marginBottom10"><a href="ListeVIP.php" class="linkWhite">VIP</a></li>

      </ol>
      <ol class="navigationFooterOl">
        <li class="marginBottom10"><a href="contact.php" class="linkWhite">Infos Pratiques et Contact</a></li>
        <li class="marginBottom10"><a href="reseaux.php" class="linkWhite">Nos réseaux sociaux</a></li>
        <li class="marginBottom10"><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

      </ol>
    </nav>
    <!-- </div> -->

</footer>
