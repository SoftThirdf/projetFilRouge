<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="../style/index.css">
  <link rel="stylesheet" href="../style/StandMenu.css">
  <title>StandMatchVr</title>
</head>

<body>
  <!-- <body> -->
  <?php
    if (isset($_SESSION['id']))
    {
      include_once('../headerlogStand.php');
    }
    else {
      include_once('../headernotlogStand.php');
    }
  ?>

  <div id="conteneurBody">
    <!-- C'est ici que l'on met le corps de la page -->

    <!-- First Grid: Logo & About -->
    <div class="w3-row">
      <div class="w3-half w3-container">
        <p class="w3-xxlarge w3-text-grey">"Ce jeu est le meilleur jeu de tennis"</p>
        <h1 class="w3-xxlarge w3-text-grey">Frank Drebin - Gamopat</h1>
        <h1 class="w3-jumbo">DreamMatchVR</h1>
      </div>
      <div class="w3-half w3-container w3-xlarge w3-text-grey">
        <p class="w3-xlarge w3-text-grey">Il n’est pas toujours possible de se consacrer à sa passion pour le tennis. Que diriez vous de jouer au tennis dans votre salon ?</p>
        <p>Nous vous proposons une expérience en réalité virtuel ! Il sera possible pour les plus chanceux de repartir avec un exemplaire du jeux !</p>

      </div>
    </div>

    <!-- Second Grid: Resent -->
    <div class="w3-panel w3-text-grey">
      <h4>
        <center>Trailer de DreamMatchVR:</center>
      </h4>
    </div>
    <div class="w3-row">
      <div class="w3-half w3-container">
        <img src="../img/PhotoStand/MatchVR.jpg" style="width:100%">
      </div>
      <div class="w3-half w3-container">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/TdMU35xSMgY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <p class="w3-xlarge w3-text-grey">
          Bimboosoft revient avec leur nouveau jeux vidéo en réalité virtuel ! Après Rollercoaster Dreams sur PlayStation 4, venez essayer DreamMatchVR vous proposant de jouer au tennis en réalité virtuel comme si vous y étiez ! Une expérience
          immersive et passionnante ! <br>
          Ouvert de 9h à 18h. Entré libre et gratuite.

        </p>
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
      <li class="marginBottom10"><a href="../ListeVIP.php" class="linkWhite">VIP</a></li>

    </ol>
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="../contact.php" class="linkWhite">Infos Pratiques et Contact</a></li>
      <li class="marginBottom10"><a href="../reseaux.php" class="linkWhite">Nos réseaux sociaux</a></li>
      <li class="marginBottom10"><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>



</footer>

</html>
