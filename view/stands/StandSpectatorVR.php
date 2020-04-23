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
  <title>StandSpectatorVR</title>
</head>

<body>
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
    <center>
      <p class="w3-jumbo"> SpectatorVR </p>
      <p class="w3-xxlarge w3-text-grey"> Que diriez vous d'animer un stade en entier ? </p>
    </center>
    <!-- Second Grid: Resent -->
    <div class="w3-row">
      <div class="w3-half w3-container">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/yP3KVI1RIMk?start=59" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <p class="w3-xlarge w3-text-grey">
          Pendant que vous faîtes la queue ou si vous accompagnez juste quelqu’un, vous pourrez affronter un de nos fabuleux joueur en réalité augmenté. Munissez-vous de votre smartphone définissez votre terrain de jeux et lancer la partie. Partez à
          l’assaut des plus grands joueurs de tennis virtuel de l’open. Prenez l’avantage sur vos adversaires et remportez la victoire ! Un tournoi sera organisé le premier soir de l’open au stand DreamMatchVR, venez nombreux ! <br>
        </p>
      </div>
      <div class="w3-half w3-container">
        <p class="w3-xlarge w3-text-grey">
          SpectatorVR est un jeu en réalité virtuel proposant d’incarner un spectateur d’un match de tennis. Les matchs de tennis ont la mauvaise réputation de ne pas être particulièrement animé par les spectateurs. Il est temps de changer !
          L’espace d’une dizaine de minute venez ambiancer tout un match de tennis ! Un moment à partager en famille, accès gratuit !
        </p>
        <iframe title="vimeo-player" src="https://player.vimeo.com/video/277669653" width="640" height="360" frameborder="0" allowfullscreen></iframe>
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
