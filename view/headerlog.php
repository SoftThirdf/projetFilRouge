<link type="text/css" rel="stylesheet" href="../view/style/index.css">
<link type="text/css" rel="stylesheet" href="../view/style/headerlog.css">
<header class="s100" id="haut">
  <div id="conteneurNavigation">
    <div id="conteneurLogoMenu">
      <a href="../view/index.php" class="s100"><img src="../view/img/logoOpen.png" alt="logoTournoi" id="logoOpen" class="s100"></a>
    </div>
    <nav id="navigation">
      <ol id="navigationOl">
        <li> <a href="index.php" class="linkBlackRouge">ACCUEIL</a></li>
          <li><a href="../controler/tournoisSimQuaControler.php" class="linkBlackRouge">TABLEAUX DES TOURNOIS</a></li>
		  <li><a href="StandMenu.html" class="linkBlackRouge">STANDS DE L'OPEN </a></li>
          <li><a href="ListeVIP.php" class="linkBlackRouge">VIP</a></li>
      </ol>
    </nav>
    <div id="conteneurConnexionMenu">
      <div id="btnInscription" class="btn">
       <ul>
         <li>
           <a href="../view/Moncompte.php">
             <?php
              $prenom= $_SESSION['prenom'];
              echo "Bonjour ".$prenom;
             ?>
           </a>
           <ul>
             <li><a href ="../controler/infosControler.php" class="linkBlack"> Mes informations</a></li>
           </ul>
         </li>
       </ul>
      </div>
       <a href="../controler/logoutControler.php" class="linkBlack btn" id="btnConnexion" class="btn">
         <div>Déconnexion </div>
       </a>
      </div>
    </div>
</header>
