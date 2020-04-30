<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
  <div id="conteneurBody">
    <div id="carousel" class="carousel slide marginBotConteneur3" data-ride="carousel" data-interval="10000">
      <!-- Indicateurs -->
      <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
        <li data-target="#carousel" data-slide-to="3"></li>
      </ol>

      <!-- Ce que l'on met dans les slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="../view/img/imgCarousel/imgCarousel1.jpg" alt="">
        </div>

        <div class="item">
          <img src="../view/img/imgCarousel/imgCarousel2.jpg" alt="">
        </div>

        <div class="item">
          <img src="../view/img/imgCarousel/imgCarousel3.jpg" alt="">
        </div>

        <div class="item">
          <img src="../view/img/imgCarousel/imgCarousel4.jpg" alt="">
        </div>
      </div>

      <!-- contrôles gauche et droit -->
      <a class="left carousel-control" href="#carousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Précédant</span>
      </a>
      <a class="right carousel-control" href="#carousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Suivant</span>
      </a>
    </div>

    <div id="conteneurMiddlePage" class="conteneurPage marginBotConteneur3">
      <h2>Les infos de l'Open</h2>
      <hr class="sousH2">
      <div id="ConteneurArticles">
        <div class="conteneurMiddleArticle">
          <img src="../view/img/imgArticle/article1.jpg" alt="stand" class="imgArticle">
          <h3>Partager</h3>
          <p>
            L’Open Sopra Steria de Lyon est l’occasion de se retrouver. Amis, famille, collègues, réunissez-vous autour d’un rafraîchissement pour débattre du set de Cantin Aubrey ou de la faute Joao Sousa. Organisé à la période des beaux jours dans la ville gastronomique, ce tournoi vous invite à partager des beaux moments avec vos proches. Retrouvez sur notre site toute l’actualité de l’Open pour ne rien manquer.
          </p>
          </div>
        <div class="conteneurMiddleArticle">
          <img src="../view/img/imgArticle/article2.jpg" alt="jouer" class="imgArticle">
          <h3>Jouer</h3>
          <p>
            Jeu, set et match ! Profitez de nos ateliers pour suivre des activités sportives, apprenez à engager, trouvez bonne raquette à votre poignet, et initiez vos enfants au tennis grâce à notre atelier LearnTennis pour les grands mais aussi les petits. C’est l’occasion rêvée de vous dégourdir les jambes et améliorer votre jeu, venez découvrir nos salles gratuites dédiées au Squash. Et si on bougeait un peu ?
          </p>
        </div>
        <div class="conteneurMiddleArticle">
          <img src="../view/img/imgArticle/article3.jpg" alt="supporter" class="imgArticle">
          <h3>Supporter</h3>
          <p>
            Gardez un œil sur vos joueurs favoris. Nous avons mis en place, pour vous, le tableau des scores, vous y retrouverez pendant toute la période du tournoi les résultats de tous les joueurs pour tous les matchs. Vous pouvez également retrouvez vos idoles, nos VIP, sur un stand réservé aux dédicaces, c’est une occasion unique de passer un moment spécial avec ces célébrités, ne la ratez surtout pas !
          </p>
        </div>
      </div>
    </div>

    <div id="conteneurSponsor" class="conteneurPage">
      <h2>Nos Sponsors</h2>
      <hr class="sousH2">
      <div id="conteneurImagesSponsor">
        <div class="sponsor">
          <a href="https://www.orange.fr/" target="_blank" class="s100"><img src="../view/img/logoSponsor/logoOrange.png" alt="logoOrange" class="s100"></a>
        </div>
        <div class="sponsor">
          <a href="https://www.soprasteria.com/" target="_blank" class="s100"><img src="../view/img/logoSponsor/logoSopra.png" alt="logoSopra" class="s100"></a>
        </div>
        <div class="sponsor">
          <a href="https://www.head.com/" target="_blank" class="s100"><img src="../view/img/logoSponsor/logoHead.svg" alt="logoHead" class="s100"></a>
        </div>
        <div class="sponsor">
          <a href="https://www.univ-lyon3.fr/" target="_blank" class="s100"><img src="../view/img/logoSponsor/logoUnivLyon3.png" alt="logoUnivLyon3" class="s100"></a>
        </div>
        <div class="sponsor">
          <a href="https://www.wilson.com/" target="_blank" class="s100"><img src="../view/img/logoSponsor/logoWilson.png" alt="logoWilson" class="s100"></a>
        </div>
      </div>
    </div>

  </div>

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
      <li><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>
  </div>


</footer>

</html>
