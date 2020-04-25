<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style/index.css">
  <link rel="stylesheet" href="../style/StandMatchVr.css">
  <title>StandMatchVr</title>
</head>

<body>
  <!-- <body> -->
  <?php
  if (isset($_SESSION['id']))
  {
    include_once('../headerlogStand.php');
  }
  elseif (isset($_SESSION['admin'])) {
    include_once('../headerAdminStand.php');
  }
  else {
    include_once('../headernotlogStand.php');
  }
  ?>

  <div id="conteneurBody">
    <!-- C'est ici que l'on met le corps de la page -->
    <h2>DreamMatchVR</h2>
    <hr class="sousH2">
    <div id="textSousH2">
      <p><q>Ce jeu est le meilleur jeu de tennis</q>, Frank Drebin - Gamopat</p>
    </div>
    <div>
      <p class="">Il n’est pas toujours possible de se consacrer à sa passion pour le tennis. Que diriez vous de jouer au tennis dans votre salon ?</p>
      <p>Nous vous proposons une expérience en réalité virtuel ! Il sera possible pour les plus chanceux de repartir avec un exemplaire du jeux !</p>
    </div>

    <div>
      <h4>
        <center>Trailer de DreamMatchVR:</center>
      </h4>
      <div id="conteneurInfos">
        <div id="conteneurImg">
          <img class="s100" src="../img/PhotoStand/MatchVR.jpg">
        </div>
        <div id="conteneurTextVideo">
          <iframe src="https://www.youtube.com/embed/TdMU35xSMgY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          <p>
            Bimboosoft revient avec leur nouveau jeux vidéo en réalité virtuel ! Après Rollercoaster Dreams sur PlayStation 4, venez essayer DreamMatchVR vous proposant de jouer au tennis en réalité virtuel comme si vous y étiez ! Une expérience
            immersive et passionnante ! <br>
            Ouvert de 9h à 18h. Entré libre et gratuite.
          </p>
        </div>
      </div>
    </div>
  </div>
</body>

<footer>
  <div id="conteneurNavigationFooter">
    <a href="../index.php" class="s100"><img src="../img/logoOpenFooter.png" alt="logoTournoi" id="logoOpenFooter" class="s100"></a>
  </div>
  <nav id="navigationFooter">
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="../index.php" class="linkWhite">Accueil</a></li>
      <li class="marginBottom10"><a href="../../controler/tournoisSimQuaControler.php" class="linkWhite">Tableaux des tournois</a></li>
      <li class="marginBottom10"><a href="StandMenu.php" class="linkWhite">Stands de l'open</a></li>
      <li class="marginBottom10"><a href="../../controler/listeVIPControler.php" class="linkWhite">VIP</a></li>

    </ol>
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="../contact.php" class="linkWhite">Infos Pratiques et Contact</a></li>
      <li class="marginBottom10"><a href="../reseaux.php" class="linkWhite">Nos réseaux sociaux</a></li>
      <li class="marginBottom10"><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>



</footer>

</html>
