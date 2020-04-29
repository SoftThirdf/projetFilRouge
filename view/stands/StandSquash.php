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
  <link rel="stylesheet" href="../style/StandSquash.css">
  <title>StandSquash</title>
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
      <h2> Squash </h2>
      <hr class="sousH2">
      <p id="textSousH2"> Entrez dans une partie pleine de rebondissement !</p>

    <div id="conteneurInfos">
      <div id="conteneurImg">
        <img src="../img/PhotoStand/Squash.jpg" class="s100">
      </div>
      <div id="conteneurDescription">
        <p id="descriptionSquash">
          Pour vous dégourdir un peu entre deux longues sessions de matchs, que diriez-vous de vous bougez un peu dans l'une de nos salles consacrées au squash ! Venez défier vos amis ou votre famille en un contre un ! <br>
        </p>
        <p id="horaireSquash">Ouvert de 9h à 18h. <br> Entrée libre et gratuite.</p>
      </div>
    </div>
    <h4>
      <center>Highlights du match de l'année de Squash de 2018 !</center>
    </h4>
    <center> <iframe id="videoHi" src="https://www.youtube.com/embed/-KxgMl0Wp04" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </center>
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
