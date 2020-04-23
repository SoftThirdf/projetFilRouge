<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="../view/style/Moncompte1.css">
  <link type="text/css" rel="stylesheet" href="../view/style/Motdepassemodifie.css">
  <title>Mon Compte</title>
</head>

<body>
  <?php
  include_once('../view/headerlog.php');
  ?>

  <div id="corps">
    <!-- C'est ici que l'on met le corps de la page -->
    <div class="modif">
      <h1>Votre mot de passe a bien été modifié</h1>
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
      <li class="marginBottom10"><a href="../controler/tournoisSimQuaControler.php" class="linkWhite">Tableaux des tournois</a></li>
	  <li class="marginBottom10"><a href="../view/stands/StandMenu.php" class="linkWhite">Stands de l'open</a></li>
      <li class="marginBottom10"><a href="../view/ListeVIP.php" class="linkWhite">VIP</a></li>

    </ol>
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="../view/contact.php" class="linkWhite">Infos Pratiques et Contact</a></li>
      <li class="marginBottom10"><a href="../view/reseaux.php" class="linkWhite">Nos réseaux sociaux</a></li>
      <li class="marginBottom10"><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>
  </div>
</footer>
</html>
