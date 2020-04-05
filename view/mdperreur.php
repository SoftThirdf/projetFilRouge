<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../view/style/Forconnexion.css">
  <title>Connexion</title>
</head>

<body>

  <header class="s100" id="haut">
    <div id="conteneurNavigation">
      <div id="conteneurLogoMenu">
        <a href="../view/index.php" class="s100"><img src="../view/img/logoOpen.png" alt="logoTournoi" id="logoOpen" class="s100"></a>
      </div>
      <nav id="navigation">
        <ol id="navigationOl">
          <li> <a href="../view/index.php" class="linkBlackRouge">ACCUEIL</a></li>
          <li><a href="tournoisSimQuaControler.php" class="linkBlackRouge">TABLEAUX DES TOURNOIS</a></li>
          <li><a href="#" class="linkBlackRouge">VIP</a></li>
        </ol>
      </nav>
    </div>
  </header>

  <div id="conteneurBody">

    <div class="conteneur">

      <div align="center">
         <form action="../controler/mdpcontroler.php" method="post">
           <tr>
             <td>
               <h4>Veuillez saisir le même mot de passe</h4>
               <h4>Nouveau mot de passe</h4>
             </td>
             <td><input type="password" name="nouveaumdp"></br>
             </td>
           </tr>
           <tr>
             <td>
               <h4>Confirmez le mot de passe</h4>
             </td>
             <td><input type="password" name="nouveaumdp2"></br>
             </td>
           </tr>
           <tr>
             <td><input type="submit" value="Valider">
             </td>
           </tr>
         </form>
      </div>

    </div>
  </div>

</body>

<footer>
  <div id="conteneurNavigationFooter">
    <a href="../view/index.php" class="s100"><img src="../view/img/logoOpenFooter.png" alt="logoTournoi" id="logoOpenFooter" class="s100"></a>
  </div>
  <nav id="navigationFooter">
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="../view/index.php" class="linkWhite">Accueil</a></li>
      <li class="marginBottom10"><a href="tournoisSimQuaControler.php" class="linkWhite">Tableau du tournoi</a></li>
      <li><a href="#" class="linkWhite">VIP</a></li>

    </ol>
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="#" class="linkWhite">Nous contacter</a></li>
      <li><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>



</footer>
</body>

</html>
