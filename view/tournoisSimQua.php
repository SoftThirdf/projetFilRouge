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
    <h2>Tableau du tournoi simple qualificatif</h2>
    <hr class="sousH2">
    <div id="conteneurTournois">
      <div class="tournoi">
        <a href="tournoisSimQuaControler.php" class="s100 linkBlackOrange linkTournoi"> Tournoi simple qualificatif &emsp; >></a>
      </div>
      <div class="tournoi">
        <a href="" class="s100 linkBlackOrange linkTournoi">Tournoi double qualificatif &emsp; >></a>
      </div>
      <div class="tournoi">
        <a href="" class="s100 linkBlackOrange linkTournoi">Tournoi simple final &emsp; >></a>
      </div>
      <div class="tournoi">
        <a href="" class="s100 linkBlackOrange linkTournoi">Tournoi double final &emsp; >></a>
      </div>
    </div>

    <div id="conteneurArbre">
      <div class="phaseTournoi">
        <?php

        global $tabFinal;

        foreach ($tabFinal as $phase => $matchs) {
          echo"<h3 class=\"h3Tournois\">$phase</h3>
          <hr class=\"sousH3\">
          <div class=\"conteneurRencontres\">";
          foreach ($matchs as $match => $joueurs) {
            echo "
            <div class=\"rencontre\">
            <table>";
            foreach ($joueurs as $key => $infos) {
              echo"<tr class=\"joueur\">
               <td class=\"nom\">$infos[0]</td>
               <td class=\"prenom\">$infos[1]</td>
               <td class=\"nation\">$infos[2]<td>";
               for ($i=3; $i < sizeof($infos) ; $i++) {
                 if ($infos[$i] == 6 || $infos[$i] == 7) {
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
      <li class="marginBottom10"><a href="tournoisSimQuaControler.php" class="linkWhite">Tableau du tournoi</a></li>
      <li><a href="#" class="linkWhite">VIP</a></li>

    </ol>
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="#" class="linkWhite">Nous contacter</a></li>
      <li class="marginBottom10"><a href="#" class="linkWhite">Se connecter</a></li>
      <li><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>


</footer>

</html>
