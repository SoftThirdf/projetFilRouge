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
    function erb1(e) {
      $.ajax({
        url: "../controler/adminCreerMatchControler.php",
        type: "POST",
        data: "id_erb=" + e.value,
        dataType: "json",

        success: function(data) {
          $("#id_erb2").find('option').remove();
          for (var i = 0; i < data.length; i++) {
            var option = document.createElement("option");
            var x = document.getElementById("id_erb2");
            option.text = data[i]['nom_equipe_ramasseur'];
            option.value = data[i]['id_equipe_ramasseur'];
            x.add(option);
          }
        },

        error: function() {
          alert("Une erreur est survenue");
        }
      });
    };

    function joueur1(e) {
      $.ajax({
        url: "../controler/adminCreerMatchControler.php",
        type: "POST",
        data: "id_joueur1=" + e.value,
        dataType: "json",

        success: function(data) {
          $("#j2").find('option').remove();
          for (var i = 0; i < data.length; i++) {
            var option = document.createElement("option");
            var x = document.getElementById("j2");
            option.text = data[i]['nom_joueur'] + ' ' + data[i]['prenom_joueur'];
            option.value = data[i]['id_joueur'];
            x.add(option);
          }
        },

        error: function() {
          alert("Une erreur est survenue");
        }
      });
    };

    function joueur2(e) {
      $.ajax({
        url: "../controler/adminCreerMatchControler.php",
        type: "POST",
        data: 'id_joueur1=' + $("#j1").val() + '&id_joueur2=' + e.value,
        dataType: "json",

        success: function(data) {
          $("#j3").find('option').remove();
          for (var i = 0; i < data.length; i++) {
            var option = document.createElement("option");
            var x = document.getElementById("j3");
            option.text = data[i]['nom_joueur'] + ' ' + data[i]['prenom_joueur'];
            option.value = data[i]['id_joueur'];
            x.add(option);
          }
        },

        error: function(err) {
          console.log(err);
          alert("Une erreur est survenue");
        }
      });
    };

    function joueur3(e) {
      $.ajax({
        url: "../controler/adminCreerMatchControler.php",
        type: "POST",
        data: 'id_joueur1=' + $("#j1").val() + '&id_joueur2=' + $("#j2").val() + '&id_joueur3=' + e.value,
        dataType: "json",

        success: function(data) {
          $("#j4").find('option').remove();
          for (var i = 0; i < data.length; i++) {
            var option = document.createElement("option");
            var x = document.getElementById("j4");
            option.text = data[i]['nom_joueur'] + ' ' + data[i]['prenom_joueur'];
            option.value = data[i]['id_joueur'];
            x.add(option);
          }
        },

        error: function(err) {
          console.log(err);
          alert("Une erreur est survenue");
        }
      });
    }
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
    <h2>Bienvenue sur la page Administrateur</h2>
    <hr class="sousH2">
    <p>C'est à partir de celle-ci que vous pourrez insérer, modifier, supprimer des éléments de la base de données.</p>
    <p>Vous pouvez désormais : <a href="adminCreerMatchControler.php">Créer un match</a>, <a href="adminCreerJoueurControler.php">Créer un joueur</a>, <a href="adminCreerArbitreControler.php">Créer un arbitre</a>, <a href="adminModifCurrentMatchControler.php">Mettre à jour les résultats d'un match en cours</a>.</p>


    <div class="conteneurFormulaire">

      <h3>Création de match</h3>
      <hr class="sousH3">

      <form class="formulaireAdmin" action="adminCreerMatchControler.php" method="post">

        <div id="conteneurTypeMatch" class="conteneurForm">
          <label for="type_match">Type de match</label>
          <select class="" name="type_match" required>
            <option value="tournoi">Tournoi</option>
            <option value="entrainement">Entrainement</option>
          </select>
        </div>

        <div id="conteneurLibelleMatch" class="conteneurForm">
          <label for="libelle_match">Libellé du match</label>
          <select class="" name="libelle_match" required>
            <option value="1/16">1/16</option>
            <option value="1/8">1/8</option>
            <option value="1/4">1/4</option>
            <option value="1/2">1/2</option>
            <option value="The Big Match">The Big Match (Finale)</option>
          </select>
        </div>

        <div id="conteneurCourt" class="conteneurForm">
          <label for="id_court">Court où ce passe le match</label>
          <select class="" name="id_court" required>
            <option value="" DEFAULT>--Choisissez un court--</option>

            <?php
              global $tabCourts;
              foreach ($tabCourts as $key => $courts) {
                $idCourt = $courts['id_Court'];
                $nomCourt = $courts['libelle_court'];
                echo "
                  <option value=\"$idCourt\">$nomCourt</option>
                ";
              }
            ?>
          </select>
        </div>

        <div id="conteneurCategorieTournoi" class="conteneurForm">
          <label for="id_Tournoi">Tournoi du match</label>
          <select class="" name="id_Tournoi" required>
            <option value="" DEFAULT>--Choisissez un tournoi--</option>

            <?php
            foreach ($tabTournois as $key => $tournois) {
              global $tabTournois;
                $idTournoi = $tournois['id_Tournoi'];
                $nomTournoi = $tournois['type_tournoi'] . ' ' . $tournois['categorie_tournoi'];
                echo "
                  <option value=\"$idTournoi\">$nomTournoi</option>
                ";
              }
            ?>
          </select>
        </div>

        <div id="conteneurTypeMatch" class="conteneurForm">
          <input type="radio" class="categorieMatch" name="categorieMatch" value="simple">
          <label for="categorieMatch">Simple</label>
          <input type="radio" class="categorieMatch" name="categorieMatch" value="double">
          <label for="categorieMatch">Double</label>
        </div>

        <div id="conteneurJoueurs" class="conteneurForm">
          <div class="joueurs" id="conteneurJ1">
            <label for="id_joueur1">Joueur 1</label>
            <select id="j1" class="" name="id_joueur1" onchange="joueur1(this)" required>
              <option value="" DEFAULT>--Choisissez un joueur--</option>

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
          </div>

          <div class="joueurs" id="conteneurJ2">
            <label for="id_joueur2">Joueur 2</label>
            <select id="j2" class="" name="id_joueur2" onchange="joueur2(this)" required>
              <option value="" DEFAULT>--Choisissez un joueur--</option>
            </select>
          </div>

          <div class="joueurs" id="conteneurJ3">
            <label for="id_joueur3">Joueur 3</label>
            <select id="j3" class="" name="id_joueur3" onchange="joueur3(this)">
              <option value="" DEFAULT>--Choisissez un joueur--</option>
            </select>
          </div>

          <div class="joueurs" id="conteneurJ4">
            <label for="id_joueur4">Joueur 4</label>
            <select id="j4" class="" name="id_joueur4" >
              <option value="" DEFAULT>--Choisissez un joueur--</option>
            </select>
          </div>
        </div>

        <div id="conteneursErb" class="conteneurForm">
          <div class="erb" id="conteneurErb1">
            <label for="id_erb1">Equipe ramasseur de balle n°1</label>
            <select id="id_erb1" class="" name="id_erb1" onchange="erb1(this)" required>
              <option value="" DEFAULT>--Choisissez une équipe de ramasseur--</option>
              <?php
                global $tabErbs;
                foreach ($tabErbs as $key => $erb) {
                $idErb = $erb['id_equipe_ramasseur'];
                $nomErb = $erb['nom_equipe_ramasseur'];
                echo "
                  <option value=\"$idErb\">$nomErb</option>
                ";
                }
              ?>
            </select>
          </div>
          <div class="erb" id="conteneurErb2">
            <label for="id_erb2">Equipe ramasseur de balle n°2</label>
            <select id="id_erb2" class="" name="id_erb2" required>
              <option value="" DEFAULT>--Choisissez une équipe de ramasseur--</option>
            </select>
          </div>
        </div>

        <div id=conteneurAbitres class="conteneurForm">

          <?php
            for ($i=1; $i <= 10 ; $i++) {
              echo"
                <div class=\"arbitres\" id=\"conteneurArbitre$i\">
                  <label for=\"id_arbitre$i\">Arbitre $i</label>
                  <select id=\"arbitre$i\" class=\"\" name=\"id_arbitre$i\" required>
                  <option value=\"\" DEFAULT>--Choisissez un arbitre--</option>
              ";

              global $tabArbitres;
              foreach ($tabArbitres as $key => $arbitres) {
              $idArbitre = $arbitres['id_arbitre'];
              $nomArbitre = $arbitres['nom_arbitre'] . ' ' . $arbitres['prenom_arbitre'];
              echo "
                <option value=\"$idArbitre\">$nomArbitre</option>
              ";
              }
              echo "
                  </select>
                </div>
              ";
            }

           ?>
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
      <li class="marginBottom10"><a href="../view/reseaux.html" class="linkWhite">Nos réseaux sociaux</a></li>
      <li class="marginBottom10"><a href="#" class="linkWhite">Se connecter</a></li>
      <li><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>

  <script type="text/javascript">
    $(".categorieMatch").on("change", function() {
      if ($(".categorieMatch:checked").val() == 'simple') {
        // unset($_POST['id_joueur3']);
        // unset($_POST['id_joueur4']);
        $("#j3").find('option').remove();
        $("#j4").find('option').remove();
        $('#conteneurJ3').hide();
        $('#conteneurJ4').hide();
      } else {
        $('#conteneurJ3').show();
        $('#conteneurJ4').show();

      }
    });
  </script>


</footer>

</html>
