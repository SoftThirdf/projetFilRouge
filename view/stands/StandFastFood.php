<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="../style/index.css">
  <link rel="stylesheet" href="../style/StandMenu.css">
  <title>StandFastFood</title>
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
    <h3><b>Pas le temps pour manger ? Prenez à emporter pour ne pas prendre une miète des matchs !</b></h3>
    <hr class="sousH3">
    <!-- First Photo Grid -->
    <div class="w3-row-padding">
      <div class="w3-third w3-container w3-margin-bottom">
        <img src="../img/PhotoStand/Tête de série.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Tête de série</b></p>
          <p>Envie de manger un sandwich ? Un croque monsieur ? Une barquette de fritte ? Tête de série vous permettra de prendre des ressources pour la journée ou de manger en terasse ! <br>
            Horaire : 11h-17h <br>
            Fourchette de prix : € </p>
        </div>
      </div>
      <div class="w3-third w3-container w3-margin-bottom">
        <img src="../img/PhotoStand/Sandwicherie Steria.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Sandwicherie Steria</b></p>
          <p>Si vous souhaitez manger rapidement à moindre coût venez vous rassasiez à la sandwicherie de l'open pour ne louper aucun match de la journée ! <br>
            Horaire : 10h-18h <br>
            Fourchette de prix : €
        </div>
      </div>
      <div class="w3-third w3-container">
        <img src="../img/PhotoStand/La glace des champions.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>La glace des champions</b></p>
          <p>Venez vous raffraichir les idées entre 2 matchs et prenez une de nos délicieuses glaces ! <br>
            Horaire : 12h-18h <br>
            Fourchette de prix : €
        </div>
      </div>
    </div>

    <!-- Second Photo Grid-->
    <div class="w3-row-padding">
      <div class="w3-third w3-container w3-margin-bottom">
        <img src="../img/PhotoStand/Engagement !.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Engagement !</b></p>
          <p>Pour bien démarer la journée que dîtes vous de déjeuner à l'engagement ? Le service est primoridial pour remporter la partie, alors il ne vaut mieux pas le rater ! <br>
            Horaire : 9h-11h puis 15h-17h<br>
            Fourchette de prix : €€
        </div>
      </div>
      <div class="w3-third w3-container w3-margin-bottom">
        <img src="../img/PhotoStand/Churros.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Churros</b></p>
          <p>Churros comme son nom l'indique vous proposera de goûter les meilleurs churros de l'Open ! Set à vous de jouer maintenant ! <br>
            Horaire : 13h-17h<br>
            Fourchette de prix : €
        </div>
      </div>
      <div class="w3-third w3-container">
        <img src="../img/PhotoStand/Les crêpes de l'open !.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Les crêpes de l'open !</b></p>
          <p>Venez passer un agréable moment on companie des meilleurs crêpes de cette Open ! Sucré, sallé et même sucré-sallé seront là ! <br>
            Horaire : 13h-17h<br>
            Fourchette de prix : €
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
      <li class="marginBottom10"><a href="../../controler/MoncompteControler.php" class="linkWhite">Se connecter</a></li>
      <li class="marginBottom10"><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>
</footer>

<script>
  // Script to open and close sidebar
  function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
  }

  function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
  }
</script>

</html>
