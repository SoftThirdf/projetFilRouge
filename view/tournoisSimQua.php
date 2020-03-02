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
        <a href="index.php" class="s100"><img src="../view/img/logoOpen.png" alt="logoTournoi" id="logoOpen" class="s100"></a>
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
    <h2>Tableau du tournoi simple qualificatif</h2>
    <hr class="sousH2">
    <div id="conteneurTournois">
      <div class="tournoi">
        <a href="tournoisSimQua" class="s100 linkBlackOrange linkTournoi"> Tournoi simple qualificatif &emsp; >></a>
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
        <h3>1/8ème de finale</h3>
        <?php

        global $tab;
        $idMatch = '';
        $idJoueur = '';
        $idMatch = $tab[0]['id_Match'];
        $idJoueur = $tab[0]['id_joueur'];
        $nomJoueur = $tab[0]['Nom_joueur'];
        $prenomJoueur = $tab[0]['Prenom_joueur'];
        $natJoueur = $tab[0]['Nationalite_joueur'];
        $set = $tab[0]['Nb_jeu_simple'];

        echo "
        <div class=\"conteneurRencontres\">
        <div class=\"rencontre\">
        <table>
        <tr class=\"joueur\">
        <td class=\"nom\">$nomJoueur</td>
        <td class=\"prenom\">$prenomJoueur</td>
        <td class=\"nation\">$natJoueur<td>";

        foreach ($tab as $key => $value) {
          if ($idMatch != $value['id_Match'] && $idJoueur != $value['id_joueur']) {
            $idMatch = $value['id_Match'];
            $idJoueur = $value['id_joueur'];
            $nomJoueur = $value['Nom_joueur'];
            $prenomJoueur = $value['Prenom_joueur'];
            $natJoueur = $value['Nationalite_joueur'];
            $set = $value['Nb_jeu_simple'];
            echo"</tr>
            </table>
        </div>";
            echo "
            <div class=\"rencontre\">
            <table>
            <tr class=\"joueur\">
            <td class=\"nom\">$nomJoueur</td>
            <td class=\"prenom\">$prenomJoueur</td>
            <td class=\"nation\">$natJoueur<td>
            <td class=\"set\">$set</td>";

          } elseif ($idMatch == $value['id_Match'] && $idJoueur != $value['id_joueur']) {
              $idJoueur = $value['id_joueur'];
              $nomJoueur = $value['Nom_joueur'];
              $prenomJoueur = $value['Prenom_joueur'];
              $natJoueur = $value['Nationalite_joueur'];
              $set = $value['Nb_jeu_simple'];

              echo"</tr>
                    <tr class=\"joueur\">
                      <td class=\"nom\">$nomJoueur</td>
                      <td class=\"prenom\">$prenomJoueur</td>
                      <td class=\"nation\">$natJoueur<td>
                      <td class=\"set\">$set</td>";
          }elseif ($idMatch == $value['id_Match'] && $idJoueur == $value['id_joueur']) {
            $set = $value['Nb_jeu_simple'];
            echo"<td class=\"set\">$set</td>";
          }
        }
        echo"</tr>
        </table>
      </div>
    </div>";


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

</html>
