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
  <title>StandLearnTennis</title>
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
    <h2><b>Vous adorez le tennins mais vous ne savez pas jouer ? Venez apprendre avec l'un de nos equipementier !</b></h2>
    <hr class="sousH2">
    <!-- First Photo Grid -->
    <div class="w3-row-padding">
      <div class="w3-third w3-container w3-margin-bottom">
        <img src="../img/PhotoStand/ApprendreAServir.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Apprenez à engager !</b></p>
          <p>Pour bien commencer une partie, savoir servir est essentiel ! <br>
            Horaire : 10h-17h <br>
            Fourchette de prix : €€ <br>
            Niveau : Débutant/Intermédiaire</p>
        </div>
      </div>

      <div class="w3-third w3-container w3-margin-bottom">
        <img src="../img/PhotoStand/Dunlop.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Stand DUNLOP</b></p>
          <p>Venez sur le stand de la marque Dunlop pour trouver la raquette qu'il vous faut ! Prix préférentiel avec possibilité d'essayer la ou les raquettes ! <br>
            Horaire : 10h-12h puis 14h-17h <br>
            Fourchette de prix : Gratuit
        </div>
      </div>
      <div class="w3-third w3-container">
        <img src="../img/PhotoStand/Déplacement.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Apprenez à vous déplacer !</b></p>
          <p> Savoir se déplacer et positionner est primordial pour bien anticiperer son adversaire ! <br>
            Horaire : 9h-12h <br>
            Fourchette de prix : Gratuit <br>
            Niveau : Débutant/Intermédiaire
        </div>
      </div>
    </div>
    <!-- Second Photo Grid-->
    <div class="w3-row-padding">
      <div class="w3-third w3-container w3-margin-bottom">
        <img src="../img/PhotoStand/Renvoie.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Renvoie la balle si tu peux !</b></p>
          <p>Un petit challenge même pour les débutants ! Une machine te tire dessus 1 balle toute les 3 secondes, renvoies en le plus possible ! <br>
            Horaire : 9h-11h puis 13h-17h<br>
            Fourchette de prix : € <br>
            Niveau : Tout niveau
        </div>
      </div>
      <div class="w3-third w3-container w3-margin-bottom">
        <img src="../img/PhotoStand/LittleTennis.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>LittleTennis</b></p>
          <p>Pour les enfants qui souhaitent eux aussi jouer, il est possible d'affronter ses camarades sur un petit terrain pour leur faire mordre la poussière ! <br>
            Horaire : 9h-16h<br>
            Fourchette de prix : € <br>
            Pour les moins de 10 ans
        </div>
      </div>
      <div class="w3-third w3-container">
        <img src="../img/PhotoStand/Nike.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Stand Nike</b></p>
          <p>Venez sur le stand de la marque Nike pour trouver la paire de chaussure qu'il vous faut ! Prix préférentiel avec possibilité d'essayer la ou les paires ! <br>
            Horaire : 10h-17h<br>
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
