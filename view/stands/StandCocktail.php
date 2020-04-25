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
  <title>StandCocktail</title>
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
    <h2><b> Tout nos bars et nos soirées cocktails</b></h2>
    <hr class="sousH2">
    <!-- First Photo Grid -->
    <div class="w3-row-padding">
      <div class="w3-third w3-container w3-margin-bottom">
        <img src="../img/PhotoStand/Le break.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Le break</b></p>
          <p>Venez faire une pause durant votre journée et prenez un verre ! Lieu préféré des jeunes VIP, ambiance décontractée, tout est là pour passer une bonne soirée ! Soirée spéciale pour le big match avec un happy hour toute la soirée ! <br>
            Horaire : 21h-15h <br>
            Fourchette de prix : €€</p>
        </div>
      </div>
      <div class="w3-third w3-container w3-margin-bottom">
        <img src="../img/PhotoStand/Jeux set et match.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Jeux set et match !</b></p>
          <p>Après une journée assis à regarder des matchs, venez danser et festoyer à nos soirée cocktail. En famille ou entre amis, Jeux set et match c’est le bar de l’open qui vous fera finir cet évènement en beauté ! <br>
            Horaire : 21h-4h <br>
            Fourchette de prix : €€
        </div>
      </div>
      <div class="w3-third w3-container">
        <img src="../img/PhotoStand/L'open bar.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>L'open bar</b></p>
          <p>L’open bar c’est chaque soir une soirée cocktail (avec alcool ou non), l’occasion de rencontrer les plus grande VIP du tournoi ou de simplement passer un moment en toute tranquillité. <br>
            Horaire : 19h-2h <br>
            Fourchette de prix : €€€
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
