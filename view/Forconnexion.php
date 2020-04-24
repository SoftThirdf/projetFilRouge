<?php

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../view/style/index.css">
  <link rel="stylesheet" href="../view/style/Forconnexion.css">
  <title>Connexion</title>
</head>

<body>

  <?php
  if (isset($_SESSION['id']))
  {
    include_once('../view/headerlog.php');
  }elseif (isset($_SESSION['admin'])) {
    include_once('../view/headerAdmin.php');
  }
  else {
    include_once('../view/headernotlog.php');
  }
  ?>

  <div id="conteneurBody">

    <h2>Connexion à la plateforme</h2>
    <hr class="sousH2">

        <form id="formConnexion"action="../controler/MoncompteControler.php" method="post">
          <div id="conteneurFormLogin">
            <div id="formImg">
              <img class="s100" src="../view/img/loginForm.jpg" alt="raquette">
            </div>
            <div id="conteneurInputsBtn">
              <?php
                global $echec;
                if (isset($echec)) {
                  echo"<p id=\"msgErreur\"> $echec </p>";
                }else{
                    session_start();
                }
               ?>
              <div id="conteneurInputs">
                <div id="formLogin" class="conteneurChamps">
                  <label class="labelConnexion">NOM DE COMPTE</label>
                  <input class="inputConnexion" type="text" name="login" required>
                </div>
                <div id="formMdp" class="conteneurChamps">
                  <label class="labelConnexion">MOT DE PASSE</label>
                  <input class="inputConnexion" type="password" name="mdp" required>
                </div>
              </div>
              <div id="btnConnexion">
                <input id="btnG" type="submit" value="CONNEXION">
                <input id="btnD" type="submit" value=">">
              </div>
            </div>
          </div>
        </form>

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



</footer>
</body>

</html>
