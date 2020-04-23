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
  <title>StandRestaurant</title>
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
    <h3><b> Tout nos restaurants à votre disposition</b></h3>
    <hr class="sousH3">
    <!-- First Photo Grid -->
    <div class="w3-row-padding">
      <div class="w3-third w3-container w3-margin-bottom">
        <img src="../img/PhotoStand/SETait bon.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>SETait bon !</b></p>
          <p>Setait bon est un restaurant avec une cuisine varié pour toute la famille. Entre 2 sets venez vous restaurer ! <br>
            Horaire : 11h-15h <br>
            Fourchette de prix : €€</p>
        </div>
      </div>
      <div class="w3-third w3-container w3-margin-bottom">
        <img src="../img/PhotoStand/Jupiter.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Jupiter</b></p>
          <p>Le Jupiter c'est le restaurant lyonnais de cet open. Une cuisine traditionnelle préparé par les plus grand chef. Qu'attendez vous ? <br>
            Horaire : 11h45h-16h <br>
            Fourchette de prix : €€€€€
        </div>
      </div>
      <div class="w3-third w3-container">
        <img src="../img/PhotoStand/Apollon.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Apollon</b></p>
          <p>L'Apollon est le restaurant luxueux de l'open ! Venez vous délecter de son ambiance et ses plats fait par les plus grand chefs de la région ! <br>
            Horaire : 11h30-16h <br>
            Fourchette de prix : €€€€
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
