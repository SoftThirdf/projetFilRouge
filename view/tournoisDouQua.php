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
  }elseif (isset($_SESSION['admin'])) {
    include_once('../view/headerAdmin.php');
  }
  else {
    include_once('../view/headernotlog.php');
  }
  ?>

  <div id="conteneurBody">
    <h2>Tableau du tournoi double qualificatif</h2>
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

            foreach ($matchs as $match => $equipes) {
              $nbEquipe = 0;

              echo "
              <div class=\"rencontre\">
              <table>";

              foreach ($equipes as $key => $joueurs) {
                $nbEquipe++;

                if ($nbEquipe == 1) {
                  $next = next($equipes);
                }elseif($nbEquipe == 2){
                  $tabScorePrev = $tabScore;
                }

                if (isset($tabScore)) {
                  unset($tabScore);
                }

                echo "<tr class=\"equipe\">";
                // On créé un tableau de score pour chaque équipe
                $tabScore;
                // Pour pouvoir initialiser les valeurs à zéro de ce tableau, il faut connaitre la taille du nombre total de set qu'il y a dans le match
                foreach ($joueurs as $key => $a) {
                  //Ce sera donc $a
                }

                // On initialise les valeurs du tableau à zéro. Pour chaque set, les valeurs sont au départ à zéro.
                $l = 1;
                for ($i=3; $i < sizeof($a) ; $i++) {
                  if ($next!=null) {
                    $tabScoreNext[$l] = 0;
                  }
                  $tabScore[$l] = 0;
                  $l++;
                }
                // Ensuite, on additionne pour chaque joueurs les points marqué des sets, pour avoir un total de set marqué
                foreach ($joueurs as $key => $infos) {
                  $j = 1;
                  for ($i=3; $i < sizeof($infos) ; $i++) {
                    $tabScore[$j] = $tabScore[$j] + $infos[$i][1];
                    $j++;
                  }
                }

                if ($next != null) {
                  foreach ($next as $key => $joueursNext) {
                      $j = 1;
                      for ($i=3; $i < sizeof($joueursNext) ; $i++) {
                        $tabScoreNext[$j] = $tabScoreNext[$j] + $joueursNext[$i][1];
                        $j++;
                      }
                  }
                }


            // Puis, on les affiches
                $nbJ = 0;
                foreach ($joueurs as $key => $infos) {
                  $nbJ++;
                  $nomPays=strtolower($infos[2]);
                  $lienDrap = "\"../view/img/pays/$nomPays.png\"";
                  echo"<tr class=\"joueur\">
                  <td class=\"nom\">$infos[0]</td>
                  <td class=\"prenom\">$infos[1]</td>
                  <td class=\"nation\"> <img src=$lienDrap alt=\"$nomPays\"> <td>";
                  // Si c'est le premier joueur, alors on affiche le score dans un td avec rowspan à 2 pour qu'il englobe les deux joueurs
                  if ($nbJ == 1) {
                    for ($k=1; $k < sizeof($tabScore)+1 ; $k++) {
                      if ($nbEquipe==1) {
                        if ($tabScoreNext[$k] < $tabScore[$k]) {
                            $jeu = $tabScore[$k];
                            echo" <td class=\"set setWin\" rowspan=2>$jeu</td>";
                        }else{
                            $jeu = $tabScore[$k];
                            echo" <td class=\"set\" rowspan=2>$jeu</td>";
                        }
                      }elseif($nbEquipe==2){
                        if ($tabScorePrev[$k] < $tabScore[$k]) {
                            $jeu = $tabScore[$k];
                            echo" <td class=\"set setWin\" rowspan=2>$jeu</td>";
                        }else{
                            $jeu = $tabScore[$k];
                            echo" <td class=\"set\" rowspan=2>$jeu</td>";
                        }
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
      <li class="marginBottom10"><a href="../controler/tournoisSimQuaControler.php" class="linkWhite">Tableaux des tournois</a></li>
      <li class="marginBottom10"><a href="../view/stands/StandMenu.php" class="linkWhite">Stands de l'open</a></li>
      <li class="marginBottom10"><a href="../view/listeVIPControler.php" class="linkWhite">VIP</a></li>

    </ol>
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="../view/contact.php" class="linkWhite">Infos Pratiques et Contact</a></li>
      <li class="marginBottom10"><a href="../view/reseaux.php" class="linkWhite">Nos réseaux sociaux</a></li>
      <li><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>


</footer>

</html>
