<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../view/style/index.css">
  <link rel="stylesheet" href="../view/style/tournois.css">
  <title>Accueil</title>
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
    <h2>Tableau du tournoi simple officiel</h2>
    <hr class="sousH2">
    <div id="conteneurTournois">
      <div class="tournoi">
        <a href="tournoisSimQuaControler.php" class="s100 linkBlackOrange linkTournoi"> Tournoi simple qualificatif &emsp; >></a>
      </div>
      <div class="tournoi">
        <a href="tournoisDouQuaControler.php" class="s100 linkBlackOrange linkTournoi">Tournoi double qualificatif &emsp; >></a>
      </div>
      <div class="tournoi">
        <a href="tournoisSimFinControler.php" class="s100 linkBlackOrange linkTournoi">Tournoi simple final &emsp; >></a>
      </div>
      <div class="tournoi">
        <a href="tournoisDouFinControler.php" class="s100 linkBlackOrange linkTournoi">Tournoi double final &emsp; >></a>
      </div>
    </div>

    <div id="conteneurArbre">
      <div class="phaseTournoi">
        <?php

        global $tabFinal;

        if ($tabFinal == null) {
          echo "<div style=\"height:30vh;\">
          <h3 style=\"margin-top:5em;\">Désolé, il n'y a pas de match en cours</h3>
          </div>";
        }else{
          foreach ($tabFinal as $phase => $matchs) {
            echo"<h3 class=\"h3Tournois\">$phase</h3>
            <hr class=\"sousH3\">
            <div class=\"conteneurRencontres\">";
            foreach ($matchs as $match => $joueurs) {
              echo "
              <div class=\"rencontre\">
              <table>";
              foreach ($joueurs as $key => $infos) {
                $next = next($joueurs);
                $prev = prev($joueurs);
                $nomPays=strtolower($infos[2]);
                $lienDrap = "\"../view/img/pays/$nomPays.png\"";
                echo"<tr class=\"joueur\">
                <td class=\"nom\">$infos[0]</td>
                <td class=\"prenom\">$infos[1]</td>
                <td class=\"nation\"> <img src=$lienDrap alt=\"$nomPays\"> <td>";
                for ($i=3; $i < sizeof($infos) ; $i++) {
                  if (($next != null && $next[$i]<$infos[$i]) || ($prev != null && $prev[$i] < $infos[$i])) {
                    echo" <td class=\"set setWin\">$infos[$i]</td>";
                  }else{
                    echo" <td class=\"set\">$infos[$i]</td>";
                  }
                }
              }
              echo"</tr>
              </table>
              </div>";
            }
            echo"</div>";
          }
        }

        ?>

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
      <li class="marginBottom10"><a href="../controler/tournoisSimQuaControler.php" class="linkWhite">Tableaux des tournois</a></li>
	  <li class="marginBottom10"><a href="../view/StandMenu.html" class="linkWhite">Stands de l'open</a></li>
      <li class="marginBottom10"><a href="../view/ListeVIP.php" class="linkWhite">VIP</a></li>

    </ol>
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="../view/contact.php" class="linkWhite">Infos Pratiques et Contact</a></li>
      <li class="marginBottom10"><a href="../controler/MoncompteControler.php" class="linkWhite">Se connecter</a></li>
      <li class="marginBottom10"><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>


</footer>

</html>
