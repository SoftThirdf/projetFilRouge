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

  <?php
    if (isset($_SESSION['id']))
    {
      include_once('../view/headerlog.php');
    }
    else {
      include_once('../view/headernotlog.php');
    }
  ?>

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
      <li class="marginBottom10"><a href="index.php" class="linkWhite">Accueil</a></li>
      <li class="marginBottom10"><a href="../controler/tournoisSimQuaControler.php" class="linkWhite">Tableaux des tournois</a></li>
	  <li class="marginBottom10"><a href="stands/StandMenu.php" class="linkWhite">Stands de l'open</a></li>
      <li class="marginBottom10"><a href="ListeVIP.php" class="linkWhite">VIP</a></li>

    </ol>
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="contact.php" class="linkWhite">Infos Pratiques et Contact</a></li>
      <li class="marginBottom10"><a href="../controler/MoncompteControler.php" class="linkWhite">Se connecter</a></li>
      <li class="marginBottom10"><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>



</footer>
</body>

</html>
