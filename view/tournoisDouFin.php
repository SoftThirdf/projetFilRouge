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
    <h2>Tableau du tournoi double officiel</h2>
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
          echo "Désolé, il n'y a pas de match en cours";
        }else{
          foreach ($tabFinal as $phase => $matchs) {
            echo"<h3 class=\"h3Tournois\">$phase</h3>
            <hr class=\"sousH3\">
            <div class=\"conteneurRencontres\">";
            foreach ($matchs as $match => $equipes) {
              echo "
              <div class=\"rencontre\">
              <table>";
              foreach ($equipes as $key => $joueurs) {
                echo "<tr class=\"equipe\">";
                // On créé un tableau de score pour chaque équipe
                $tabScore;
                // Pour pouvoir initialiser les valeurs à éro de ce tableau, il faut connaitre la taille du  nombre total de set qu'il y a dans le match
                foreach ($joueurs as $key => $a) {
                  //Ce sera donc $a
                }
                // On initialise les vlauers du tableau à zéro. Pour chaque set, les vlauers sont au départ à zéro.
                $l = 0;
                for ($i=3; $i < sizeof($a) ; $i++) {
                  $tabScore[$l] = 0;
                  $l++;
                }
                // Ensuite, on additionne pour chaque joueurs les points marqué des sets, pour avoir un total de set marqué
                foreach ($joueurs as $key => $infos) {
                  $j = 0;
                  for ($i=3; $i < sizeof($infos) ; $i++) {
                    $tabScore[$j] = $tabScore[$j] + $infos[$i];
                    $j++;
                  }
                }
                //  Puis, on les affiches
                $nbJ = 0;
                foreach ($joueurs as $key => $infos) {
                  $nbJ++;
                  echo"<tr class=\"joueur\">
                  <td class=\"nom\">$infos[0]</td>
                  <td class=\"prenom\">$infos[1]</td>
                  <td class=\"nation\">$infos[2]<td>";
                  // Si c'est le premier joueur, alors on affiche le socre dans un td avec rowspan à 2 pour qu'il englobe les deux joueurs
                  if ($nbJ == 1) {
                    for ($k=0; $k < sizeof($tabScore) ; $k++) {
                      if ($tabScore[$k] == 6 || $tabScore[$k] == 7) {
                        echo" <td class=\"set setWin\" rowspan=2>$tabScore[$k]</td>";
                      }else{
                        echo" <td class=\"set\" rowspan=2>$tabScore[$k]</td>";
                      }
                    }
                  }
                }
              }
              echo"</tr>
              </tr>
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
      <li class="marginBottom10"><a href="tournoisSimQuaControler.php" class="linkWhite">Tableau du tournoi</a></li>
      <li><a href="#" class="linkWhite">VIP</a></li>

    </ol>
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="../view/contact.php" class="linkWhite">Infos Pratiques et Contact</a></li>
      <li class="marginBottom10"><a href="#" class="linkWhite">Se connecter</a></li>
      <li><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>


</footer>

</html>