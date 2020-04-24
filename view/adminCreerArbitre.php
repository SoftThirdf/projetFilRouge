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
    }elseif (isset($_SESSION['admin'])) {
      include_once('../view/headerAdmin.php');
    }
    else {
      include_once('../view/headernotlog.php');
    }
  ?>

  <div id="conteneurBody">
    <h2>Bienvenue sur la page Administrateur</h2>
    <hr class="sousH2">
    <p>C'est à partir de celle-ci que vous pourrez insérer, modifier, supprimer des éléments de la base de données.</p>
    <p>Vous pouvez désormais : <a href="adminCreerMatchControler.php">Créer un match</a>, <a href="adminCreerJoueurControler.php">Créer un joueur</a>, <a href="adminCreerArbitreControler.php">Créer un arbitre</a>, <a href="adminModifCurrentMatchControler.php">Mettre à jour les résultats d'un match en cours</a>.</p>


    <div class="conteneurFormulaire">

      <h3>Création d'arbitre</h3>
      <hr class="sousH3">

      <form class="formulaireAdmin" action="adminCreerArbitreControler.php" method="post">

        <div class="conteneurForm" id="conteneurTypeArbitre">
          <label for="">Type de l'arbitre</label>
          <select class="" name="type_arbitre" required>
            <option value="Arbitre de chaise">Arbitre de chaise</option>
            <option value="Juge arbitre">Juge arbitre</option>
            <option value="Juge de ligne">Juge de ligne</option>
            <option value="Juge de fillet">Juge de fillet</option>
          </select>
        </div>

        <div class="conteneurForm" id="conteneurCategorieArbitre">
          <label for="categorie_arbitre">Catégorie de l'arbitre</label>
          <input type="text" name="categorie_arbitre" placeholder="ex: ITT1" required>
        </div>

        <div class="conteneurForm" id="conteneurNomArbitre">
          <label for="nom_arbitre">Nom de l'arbitre</label>
          <input type="text" name="nom_arbitre" required>
        </div>

        <div class="conteneurForm" id="conteneurPrenomArbitre">
          <label for="prenom_arbitre">Prénom de l'arbitre</label>
          <input type="text" name="prenom_arbitre" required>
        </div>

        <div class="conteneurForm" id="conteneurNationaliteArbitre">
          <label for="nationalite_arbitre">Nationalité de l'arbitre</label>
          <select class="" name="nationalite_arbitre" required>
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

        <div class="conteneurForm" id="conteneurTelArbitre">
          <label for="telephone_arbitre">Numéro de téléphone de l'arbitre</label>
          <input type="tel" name="telephone_arbitre"  placeholder="ex: 04.01.02.03.04" required>
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
      <li class="marginBottom10"><a href="../view/stands/StandMenu.php" class="linkWhite">Stands de l'open</a></li>
      <li><a href="#" class="linkWhite">VIP</a></li>

    </ol>
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="../view/contact.php" class="linkWhite">Infos Pratiques et Contact</a></li>
      <li class="marginBottom10"><a href="../view/reseaux.php" class="linkWhite">Nos réseaux sociaux</a></li>
      <li><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>

</footer>

</html>
