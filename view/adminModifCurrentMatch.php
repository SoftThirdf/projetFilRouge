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
  <script type="text/javascript">
  function addJeu(e, id, numMatch) {
    $.ajax({
      url: "../controler/adminModifCurrentMatchControler.php",
      type: "POST",
      data: "id_joueur=" + id + '&id_Match=' + numMatch,
      dataType: "html",

      success: function(data) {
        alert("Le jeu a correctement été ajouté !");
        document.location.reload(true);
      },

      error: function(e) {
        alert("Une erreur est survenue");
      }
    });
  };

  function addSet(e, numMatch) {
    $.ajax({
      url: "../controler/adminModifCurrentMatchControler.php",
      type: "POST",
      data: '&id_Match=' + numMatch,
      dataType: "html",

      success: function(data) {
        alert("Le set a correctement été ajouté !");
        document.location.reload(true);
      },

      error: function(e) {
        alert("Une erreur est survenue");
      }
    });
  };

  function termineMatch(e, numMatch) {
    $.ajax({
      url: "../controler/adminModifCurrentMatchControler.php",
      type: "POST",
      data: '&id_Match=' + numMatch + '&termine=' + true,
      dataType: "html",

      success: function(data) {
        alert("Le match a correctement été terminé !");
        document.location.reload(true);
      },

      error: function(e) {
        alert("Une erreur est survenue");
      }
    });
  };
  </script>
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
    <p>Vous pouvez désormais : <a href="adminCreerMatchControler.php">Créer un match</a>, <a href="adminCreerJoueurControler.php">Créer un joueur</a>, <a href="adminCreerArbitreControler.php">Créer un arbitre</a>, <a href="adminModifCurrentMatchControler.php">Mettre à jour les résultats d'un match en cours</a>.</p>


    <div class="conteneurFormulaire">

      <h3>Modification des matchs en cours</h3>
      <hr class="sousH3">

      <?php
      global $dao;

      global $tabMatchsDoubleEnCours;
      echo "<p><u> <b> Match en Double </b></u></p>";

      if(sizeof($tabMatchsDoubleEnCours)==0){
        echo "<p> Il n'y a pas de match double en cours </p>";
      }else{
        foreach ($tabMatchsDoubleEnCours as $key => $match) {
          echo "<div class=\"conteneurMatch\">";
          $numMatch = $match['id_Match'];
          $j1 = $match['nom_j1'] . ' ' . $match['prenom_j1'];
          $j2 = $match['nom_j2'] . ' ' . $match['prenom_j2'];
          $j3 = $match['nom_j3'] . ' ' . $match['prenom_j3'];
          $j4 = $match['nom_j4'] . ' ' . $match['prenom_j4'];
          $idj1 = $match['id_j1'];
          $idj2 = $match['id_j2'];
          $idj3 = $match['id_j3'];
          $idj4 = $match['id_j4'];

          echo "
          <p id=\"$numMatch\">
          Match numéro <b>$numMatch</b> opposant <b id=\"joueur1\">$j1</b> et <b id=\"joueur2\">$j2</b> vs <b id=\"joueur3\">$j3</b> et <b id=\"joueur4\">$j4</b>
          </p>
          ";
          $tabBalleSet = $dao->getBalleSetMatch($numMatch);
          if(sizeof($tabBalleSet)==0){
            echo"<p> Il n'y a pas encore de set marqué pour ce match </p>";
          }else{
            echo"<div class=\"conteneurScore\">";
            $nomEquipeCourant = '';
            $nb = 1;
            foreach ($tabBalleSet as $key => $set) {
              $numSet = $set['num_set'];
              if ($nomEquipeCourant != $set['nom_equipe'] && $nb==1) {
                echo"<div class=\"conteneurSet\">";
                echo"<u>Set numéro $numSet</u>";
              }elseif($nomEquipeCourant != $set['nom_equipe'] ){
                echo "</div> <div class=\"conteneurSet\">";
                echo"<u>Set numéro $numSet</u>";
              }
              $joueur = $set['nom_joueur'] . ' ' . $set['prenom_joueur'];
              $pts = $set['nb_jeu'];
              echo "<div class=\"score\"><p> $joueur : <b>$pts</b> jeu </p></div>";
              $nomEquipeCourant = $set['nom_equipe'];
              $nb++;
            }
            echo" </div> </div>";
          }
          echo "<input type=\"button\" value=\"Ajouter un jeu à $j1\" onclick=\"addJeu(this,$idj1,$numMatch)\">";
          echo "<input type=\"button\" value=\"Ajouter un jeu à $j2\" onclick=\"addJeu(this,$idj2,$numMatch)\">";
          echo "<input type=\"button\" value=\"Ajouter un jeu à $j3\" onclick=\"addJeu(this,$idj3,$numMatch)\">";
          echo "<input type=\"button\" value=\"Ajouter un jeu à $j4\" onclick=\"addJeu(this,$idj4,$numMatch)\"><br>";
          echo "<input class=\"btnSet\" type=\"button\" value=\"Ajouter un Set\" onclick=\"addSet(this,$numMatch)\">";
          echo "<input class=\"btnSet\" type=\"button\" value=\"Terminer le match\" onclick=\"termineMatch(this,$numMatch)\">";
          echo "</div>";
        }
      }


      global $tabMatchsSimpleEnCours;
      echo "<p><u> <b> Match en Simple </b></u></p>";


      if(sizeof($tabMatchsSimpleEnCours)==0){
        echo "<p> Il n'y a pas de match simple en cours </p>";
      }else{
        foreach ($tabMatchsSimpleEnCours as $key => $match) {
          $numMatch = $match['id_Match'];
          $j1 = $match['nom_j1'] . ' ' . $match['prenom_j1'];
          $j2 = $match['nom_j2'] . ' ' . $match['prenom_j2'];
          $idj1 = $match['id_j1'];
          $idj2 = $match['id_j2'];
          echo "
          <p id=\"$numMatch\">
          Match numéro <b>$numMatch</b> opposant <b>$j1</b> vs <b>$j2</b>
          </p>
          ";
          $tabBalleSet = $dao->getBalleSetMatch($numMatch);
          if(sizeof($tabBalleSet)==0){
            echo"<p> Il n'y a pas encore de set marqué pour ce match </p>";
          }else{
            echo"<div class=\"conteneurScore\">";
            $nomEquipeCourant = '';
            $nb = 1;
            foreach ($tabBalleSet as $key => $set) {
              $numSet = $set['num_set'];
              if ($nomEquipeCourant != $set['nom_equipe'] && $nb==1) {
                echo"<div class=\"conteneurSet\">";
                echo"<u>Set numéro $numSet</u>";
              }elseif($nomEquipeCourant != $set['nom_equipe'] ){
                echo "</div> <div class=\"conteneurSet\">";
                echo"<u>Set numéro $numSet</u>";
              }
              $joueur = $set['nom_joueur'] . ' ' . $set['prenom_joueur'];
              $pts = $set['nb_jeu'];
              echo "<div class=\"score\"><p> $joueur : <b>$pts</b> jeu </p></div>";
              $nomEquipeCourant = $set['nom_equipe'];
              $nb++;
            }
            echo" </div> </div>";
          }
          echo "<input type=\"button\" value=\"Ajouter un jeu à $j1\" onclick=\"addJeu(this,$idj1,$numMatch)\">";
          echo "<input type=\"button\" value=\"Ajouter un jeu à $j2\" onclick=\"addJeu(this,$idj2,$numMatch)\">";
          echo "<input class=\"btnSet\" type=\"button\" value=\"Ajouter un Set\" onclick=>";
          echo "<input class=\"btnSet\" type=\"button\" value=\"Terminer le match\" onclick=\"termineMatch(this,$numMatch)\">";
        }
      }

       ?>

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
