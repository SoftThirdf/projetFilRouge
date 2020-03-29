<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../view/style/Forconnexion.css">
    <title>Connexion</title>
  </head>
  <body >

      <header class="s100" id="haut">
        <div id="conteneurNavigation">
          <div id="conteneurLogoMenu">
            <a href="index.php" class="s100"><img src="img/logoOpen.png" alt="logoTournoi" id="logoOpen" class="s100"></a>
          </div>
          <nav id="navigation">
            <ol id="navigationOl">
              <li> <a href="index.php" class="linkBlackRouge">ACCUEIL</a></li>
              <li><a href="tournoisSimQua.php" class="linkBlackRouge">TABLEAUX DES TOURNOIS</a></li>
              <li><a href="#" class="linkBlackRouge">VIP</a></li>
            </ol>
          </nav>
          <div id="conteneurConnexionMenu">
            <a href="#" class="linkBlack btn" id="btnConnexion">
              <div>Connexion</div>
            </a>

            <a href="#" class="linkBlack btn" id="btnInscription">
              <div>S'inscrire </div>
            </a>
          </div>
        </div>
      </header>

      <div id="conteneurBody">

    <div class="conteneur">
      <div class="img">
        <div align="center">
        <img src="../view/img/Connexion.jpg" class="essai">
       <form action="Moncompte.php" method="post">
       <tr>
       <td>Adresse mail</td>
       <td><input type="text" name="login"></br>
       </td>
       </tr>
       <tr>
       <td>Mot de passe</td>
       <td><input type="password" name="mdp"></br>
       </td>
       </tr>
       <tr>
       <td><input type="submit" value="Connexion">
       </td>
       </tr>
       </form>
       </div>

     </div>

   </body>

   <footer>
     <div id="conteneurNavigationFooter">
       <a href="index.php" class="s100"><img src="img/logoOpenFooter.png" alt="logoTournoi" id="logoOpenFooter" class="s100"></a>
     </div>
     <nav id="navigationFooter">
       <ol class="navigationFooterOl">
         <li class="marginBottom10"><a href="index.php" class="linkWhite">Accueil</a></li>
         <li class="marginBottom10"><a href="tournoisSimQua.php" class="linkWhite">Tableau du tournoi</a></li>
         <li><a href="#" class="linkWhite">VIP</a></li>

       </ol>
       <ol class="navigationFooterOl">
         <li class="marginBottom10"><a href="#" class="linkWhite">Nous contacter</a></li>
         <li class="marginBottom10"><a href="#" class="linkWhite">Se connecter</a></li>
         <li><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

       </ol>
     </nav>



   </footer>
  </body>
</html>
