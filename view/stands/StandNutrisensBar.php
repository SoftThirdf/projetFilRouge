<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style/index.css">
  <link rel="stylesheet" href="../style/StandNutrisensBar.css">
  <title>StandNutrisensBar</title>
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
    <h2><b> Découvrez NutrisensBar !</b></h2>
    <hr class="sousH2">

    <div id="conteneurDivisionsInfos">
      <div class="conteneurInfos">
        <iframe src="https://www.youtube.com/embed/Et-C5Yyv3aY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <div class="conteneurText">
          <p><b>Qu’est-ce que Nutrisens ?</b></p>
          <p>Nutrisens est une entreprise spécialisée dans l’alimentaire avec de nombreux produits comme ceux dans la nutrition médicale, des produits hospitaliers, des produits pour les personnes qui perdent le goût ou encore des produits pour
            garder la ligne ! Nutrisens propose également des produits pour les sportifs comme des bars énergisants qui permettent de mieux récupérer ou de rester en forme. </p>
        </div>
      </div>
      <div class="conteneurInfos">
        <img src="../img/PhotoStand/NutrisensBar.jpg" alt="nutrisenBat" >
        <div class="conteneurText">
          <p><b>Un atelier de dégustation !</b></p>
          <p>Nutrisens vous propose de venir goûter ses nombreux produits sur son stand ! Barres énergétiques aux fruits, barres énergétiques au chocolat ou encore shaker seront de la partie pour vous donner envie d’essayer ces produits. Un service
            gagnant en prime afin de ne pas trop attendre ! Bénéficiez d’un tarif préférentiel entre 10h et 11h ! <br>
            Horaire : 10h-16h <br>
            Fourchette de prix : Gratuit
        </div>
      </div>
      <div class="conteneurInfos">
        <img src="../img/PhotoStand/Challenge.jpg" alt="challenge" >
        <div class="conteneurText">
          <p><b>Des défis ! </b></p>
          <p>Venez participer à un de nos nombreux défis ! Tous les matins retrouver nos organisateurs qui ont prévu de formidables challenge afin de tester l’efficacité des produits Nutrisens ! Pour chaque participation un ensemble d’échantillons
            vous sera donné afin que vous puissiez rester en forme tout au long de l’open. Alors n’attendez pas et emprunter les couloirs du succès !<br>
            Horaire : 10h-16h <br>
            Fourchette de prix : Gratuit
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
