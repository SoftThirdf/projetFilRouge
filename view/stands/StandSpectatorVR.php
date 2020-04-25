<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style/index.css">
  <link rel="stylesheet" href="../style/StandSpectatorVR.css">
  <title>StandSpectatorVR</title>
</head>

<body>
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

    <h2> SpectatorVR </h2>
    <hr class="sousH2">
    <p id="textSousH2"> Que diriez vous d'animer un stade en entier ? </p>
    <div id="conteneurTextVideo">
      <div class="conteneurInfos">
        <div class="iframeInfos">
          <iframe src="https://www.youtube.com/embed/yP3KVI1RIMk?start=59" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <p>
          Pendant que vous faîtes la queue ou si vous accompagnez juste quelqu’un, vous pourrez affronter un de nos fabuleux joueur en réalité augmenté. Munissez-vous de votre smartphone définissez votre terrain de jeux et lancer la partie. Partez à
          l’assaut des plus grands joueurs de tennis virtuel de l’open. Prenez l’avantage sur vos adversaires et remportez la victoire ! Un tournoi sera organisé le premier soir de l’open au stand DreamMatchVR, venez nombreux ! <br>
        </p>
      </div>
      <div class="conteneurInfos">
        <p>
          SpectatorVR est un jeu en réalité virtuel proposant d’incarner un spectateur d’un match de tennis. Les matchs de tennis ont la mauvaise réputation de ne pas être particulièrement animé par les spectateurs. Il est temps de changer !
          L’espace d’une dizaine de minute venez ambiancer tout un match de tennis ! Un moment à partager en famille, accès gratuit !
        </p>
        <div class="iframeInfos">
          <iframe title="vimeo-player" src="https://player.vimeo.com/video/277669653" frameborder="0" allowfullscreen></iframe>
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
