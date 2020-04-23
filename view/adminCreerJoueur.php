<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../view/style/index.css">
  <link rel="stylesheet" href="../view/style/admin.css">
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
    <h2>Bienvenue sur la page Administrateur</h2>
    <hr class="sousH2">
    <p>C'est à partir de celle-ci que vous pourrez insérer, modifier, supprimer des éléments de la base de données.</p>
    <p>Vous pouvez désormais : <a href="adminCreerMatchControler.php">Créer un match</a>, <a href="adminCreerJoueurControler.php">Créer un joueur</a>, <a href="adminCreerArbitreControler.php">Créer un arbitre</a>, <a href="adminModifCurrentMatchControler.php">Mettre à jour les
        résultats d'un match en cours</a>.</p>


    <div class="conteneurFormulaire">

      <h3>Création de joueur</h3>
      <hr class="sousH3">

      <form class="formulaireAdmin" action="adminCreerJoueurControler.php" method="post">

        <div class="conteneurForm" id="conteneurNomJoueur">
          <label for="nom_joueur">Nom du joueur</label>
          <input type="text" name="nom_joueur" required>
        </div>

        <div class="conteneurForm" id="conteneurPrenomJoueur">
          <label for="prenom_joueur">Prénom du joueur</label>
          <input type="text" name="prenom_joueur" required>
        </div>

        <div class="conteneurForm" id="conteneurNationaliteJoueur">
          <label for="nationalite_joueur">Nationalité du joueur</label>
          <select class="" name="nationalite_joueur" required>
            <?php
            global $tabNationalite;
            foreach ($tabNationalite as $key => $pays) {
              $nomPays = strtoupper($pays);
              echo"<option value=\"$nomPays\">$nomPays</option>";
            }
             ?>
            <option value="1"></option>
          </select>
        </div>

        <div class="conteneurForm" id="conteneurAgeJoueur">
          <label for="age_joueur">Age du joueur</label>
          <input type="number" name="age_joueur" min="16" required>
        </div>

        <div class="conteneurForm" id="conteneurNeJoueur">
          <label for="nom_equipe">Nom de l'équipe du joueur</label>
          <input type="text" name="nom_equipe" required>
        </div>

        <div class="conteneurForm" id="conteneurLoginJoueur">
          <label for="login">Login du joueur</label>
          <input type="text" name="login" required>
        </div>

        <div class="conteneurForm" id="conteneurMdpJoueur">
          <label for="mdp">Mot de passe du joueur</label>
          <input type="text" name="mdp" required>
        </div>

        <input type="submit" value="Enregistrer">

      </form>
    </div>

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
      <li class="marginBottom10"><a href="../view/reseaux.php" class="linkWhite">Nos réseaux sociaux</a></li>
      <li class="marginBottom10"><a href="#" class="linkWhite">Se connecter</a></li>
      <li><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>

</footer>

</html>
