<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style/index.css">
  <link rel="stylesheet" href="../style/StandMenu.css">
  <title>StandMenu</title>
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
    <div id="conteneurMiddlePage" class="marginBotConteneur3">
      <h2>Les différents ateliers de l'Open Sopra Steria !</h2>
      <hr class="sousH2">

      <div id="myBtnContainer">
        <button class="btnM active" onclick="filterSelection('all')"> Toutes les activités</button>
        <button class="btnM" onclick="filterSelection('AS')"> Activités sportives</button>
        <button class="btnM" onclick="filterSelection('VR')"> Réalité virtuelle</button>
        <button class="btnM" onclick="filterSelection('VIP')"> VIP</button>
        <button class="btnM" onclick="filterSelection('food')"> Restauration</button>
      </div>

      <div id="conteneurSousMenu">

        <div class="filterDiv AS"> <a href="StandSquash.php" class="linkAct linkBlack">Squash </a> </div>
        <div class="filterDiv VR"><a href="StandMatchVR.php" class="linkAct linkBlack">Match VR </a></div>
        <div class="filterDiv food"><a href="StandRestaurant.php" class="linkAct linkBlack">Restaurants </a></div>
        <div class="filterDiv VR"><a href="StandSpectatorVR.php" class="linkAct linkBlack">SpectatorVR </a></div>
        <div class="filterDiv food"><a href="StandFastFood.php" class="linkAct linkBlack">FastFood </a></div>
        <div class="filterDiv VIP"><a href="../../controler/StandDedicaceVIPControler.php" class="linkAct linkBlack">Dédicaces VIP </a></div>
        <div class="filterDiv food AS"><a href="StandNutrisensBar.php" class="linkAct linkBlack">NutrisensBar </a></div>
        <div class="filterDiv food VIP"><a href="StandCocktail.php" class="linkAct linkBlack">Cocktail </a></div>
        <div class="filterDiv AS"><a href="StandLearnTennis.php" class="linkAct linkBlack">LearnTennis </a></div>

      </div>
      <br>

        <img src="../img/PhotoStand/Plan.png" alt="Plan des stands" class="s100">

    </div>
  </div>
</body>

<footer>
  <div id="conteneurNavigationFooter">
    <a href="index.php" class="s100"><img src="../img/logoOpenFooter.png" alt="logoTournoi" id="logoOpenFooter" class="s100"></a>
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
  filterSelection("all")

  function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("filterDiv");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
      w3RemoveClass(x[i], "show");
      if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    }
  }

  function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      if (arr1.indexOf(arr2[i]) == -1) {
        element.className += " " + arr2[i];
      }
    }
  }

  function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      while (arr1.indexOf(arr2[i]) > -1) {
        arr1.splice(arr1.indexOf(arr2[i]), 1);
      }
    }
    element.className = arr1.join(" ");
  }

  // Add active class to the current button (highlight it)
  var btnContainer = document.getElementById("myBtnContainer");
  var btns = btnContainer.getElementsByClassName("btnM");
  for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
    });
  }
</script>

</html>
