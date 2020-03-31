<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../view/style/index.css">
  <link rel="stylesheet" href="../view/style/admin.css">
  <title>Accueil</title>
  <script type="text/javascript">
    $("#j4").change(function(event){
      alert('OUI');
      // $.post({
      //   "../controler/adminControler.php",
      //
      // });
    });

  </script>
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
          <li><a href="/tournoisSimQua.php" class="linkBlackRouge">TABLEAUX DES TOURNOIS</a></li>
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
    <h2>Bienvenue sur la page Administrateur</h2>
    <hr class="sousH2">
    <p>C'est à partir de celle-ci que vous pourrez insérer, modifier, supprimer des éléments de la base de données.</p>

    <h3>Création de match</h3>
    <hr class="sousH3">

    <form class="" action="index.html" method="post">

      <label for="type_match">Type de match</label>
      <select class="" name="type_match">
        <option value="tournoi">Tournoi</option>
        <option value="entrainement">Entrainement</option>
      </select>

      <label for="libelle_match">Libellé du match</label>
      <select class="" name="libelle_match">
        <option value="1/16">1/16</option>
        <option value="1/8">1/8</option>
        <option value="1/4">1/4</option>
        <option value="1/2">1/2</option>
        <option value="The Big Match">The Big Match (Finale)</option>
      </select>

      <label for="id_court">Court où ce passe le match</label>
      <select class="" name="id_court">
        <?php
        global $tabCourts;
        foreach ($tabCourts as $key => $courts) {
          $idCourt = $courts['id_court'];
          $nomCourt = $courts['libelle_court'];
          echo "
            <option value=\"$idCourt\">$nomCourt</option>
          ";
          }
        ?>
      </select>

      <label for="id_Tournoi">Tournoi du match</label>
      <select class="" name="id_Tournoi">
      <?php
      global $tabTournois;
      foreach ($tabTournois as $key => $tournois) {
        $idTournoi = $tournois['id_Tournoi'];
        $nomTournoi = $tournois['type_tournoi'] . ' ' . $tournois['categorie_tournoi'];
        echo "
          <option value=\"$idTournoi\">$nomTournoi</option>
        ";
        }
      ?>
      </select>

      <label for="id_joueur1">Joueur 1</label>
      <select id="j1" class="" name="id_joueur1">
      <?php
        global $tabJoueurs;
        foreach ($tabJoueurs as $key => $joueurs) {
          $idJoueur = $joueurs['id_joueur'];
          $nomJoueur = $joueurs['nom_joueur'] . ' ' . $joueurs['prenom_joueur'];
          echo "
            <option value=\"$idJoueur\">$nomJoueur</option>
          ";
          }
        ?>
      </select>

      <label for="id_joueur2">Joueur 2</label>
      <select id="j2" class="" name="id_joueur2">
        <option value="ID JOUEUR">NOM PRENOM JOUEUR</option>
      </select>

      <label for="id_joueur3">Joueur 3</label>
      <select id="j3" class="" name="id_joueur3">
        <option value="null" DEFAULT>--Pas de troisème joueur--</option>
        <option value="ID JOUEUR">NOM PRENOM JOUEUR</option>
      </select>

      <label for="id_joueur4">Joueur 4</label>
      <select id="j4" class="" name="id_joueur4" DEFAULT>
        <option value="null">--Pas de quatrième joueur--</option>
        <option value="ID JOUEUR">NOM PRENOM JOUEUR</option>
      </select>

    </form>

    <h3>Création de joueur</h3>
    <hr class="sousH3">

    <h3>Création d'arbitre</h3>
    <hr class="sousH3">

    <h3>Mise à jour des résultats d'un match en cours</h3>
    <hr class="sousH3">

  </div>

</body>

<footer>
  <div id="conteneurNavigationFooter">
    <a href="index.php" class="s100"><img src="../view/img/logoOpenFooter.png" alt="logoTournoi" id="logoOpenFooter" class="s100"></a>
  </div>
  <nav id="navigationFooter">
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="../view/index.php" class="linkWhite">Accueil</a></li>
      <li class="marginBottom10"><a href="tournoisSimQua.php" class="linkWhite">Tableau du tournoi</a></li>
      <li><a href="#" class="linkWhite">VIP</a></li>

    </ol>
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="#" class="linkWhite">Infos Pratiques et Contact</a></li>
      <li class="marginBottom10"><a href="../view/reseaux.html" class="linkWhite">Nos réseaux sociaux</a></li>
      <li class="marginBottom10"><a href="#" class="linkWhite">Se connecter</a></li>
      <li><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>



</footer>

</html>
