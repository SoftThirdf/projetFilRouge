<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style/index.css">
  <link rel="stylesheet" href="style/tournois.css">
  <title>Accueil</title>
</head>

<body>
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
    <h2>Tableaux des tournois</h2>
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

    <h3>1/8 ème de finale</h3>
    <div id="conteneurArbre">
      <!-- A GENERER EN PHP -->
      <div class="rencontre">
        <table>
          <tbody>
            <tr class="joueur">
              <td class="nom">Nom</td>
              <td class="prenom">Prénom</td>
              <td class="nation">FR<td>
              <td class="set">6</td>
              <td class="set">2</td>
              <td class="set">6</td>
            </tr>
            <tr class="joueur">
              <td class="nom">Nom</td>
              <td class="prenom">Prénom</td>
              <td class="nation">FR<td>
              <td class="set">4</td>
              <td class="set">6</td>
              <td class="set">3</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="rencontre">
        <table>
          <tbody>
            <tr class="joueur">
              <td class="nom">Nom</td>
              <td class="prenom">Prénom</td>
              <td class="nation">FR<td>
              <td class="set">6</td>
              <td class="set">2</td>
              <td class="set">6</td>
            </tr>
            <tr class="joueur">
              <td class="nom">Nom</td>
              <td class="prenom">Prénom</td>
              <td class="nation">FR<td>
              <td class="set">4</td>
              <td class="set">6</td>
              <td class="set">3</td>
            </tr>
          </tbody>
        </table>
      </div>
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

</html>
