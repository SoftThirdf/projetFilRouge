<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../view/style/index.css">
  <link rel="stylesheet" href="../view/style/reserverCourt.css">
  <link rel="stylesheet" href="../view/style/admin.css">

  <title> Profil VIP </title>

  <script type="text/javascript">
  function majCourt(e) {
    $.ajax({
      url: "reserverCourtControler.php",
      type: "POST",
      data: 'heure_debutR=' + $("#hd").val() + '&heure_finR=' + e.value + '&dateR=' + $("#date").val(),
      dataType: "json",

      success: function(data) {
        $("#courts").find('option').remove();
        for (var i = 0; i < data.length; i++) {
          var option = document.createElement("option");
          var x = document.getElementById("courts");
          option.text = data[i]['libelle_court'];
          option.value = data[i]['id_Court'];
          x.add(option);
        }
      },

      error: function(resultat, statut, erreur) {
        console.log(resultat);
        console.log(statut);
        console.log(erreur);
        alert("une erreur est survenue !");
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
    }elseif (isset($_SESSION['admin'])) {
      include_once('../view/headerAdmin.php');
    }
    else {
      include_once('../view/headernotlog.php');
    }
  ?>

  <div id="conteneurPage">

    <h2>Réserver un court</h2>
    <hr class="sousH2">

    <div>
      <h3>Vos réservations </h3>
      <hr class="sousH3">

      <?php
        global $tabReservations;
        if ($tabReservations == null) {
          echo "Vous n'avez pas de réservations en cours.";
        }else{
          foreach ($tabReservations as $key => $reserv) {
            $court = $reserv['libelle_court'];
            $date = $reserv['date_'];
            $heure_debut = $reserv['heure_debut'];
            $heure_fin = $reserv['heure_fin'];
            echo "<p>Court $court le $date de $heure_debut jusqu'à $heure_fin</p>";
          }
        }
       ?>
    </div>

    <div >
      <h3>Réserver un court </h3>
      <hr class="sousH3">

      <form  action="reserverCourtControler.php" method="post">

        <label for="date">Date de la réservation :</label>
        <input id="date" type="date" name="date" min="2020-06-13" max="2020-06-20" required>
        <label for="date">Heure de début :</label>
        <input id="hd" type="time" name="heure_debut" value="" required>
        <label for="date">Heure de fin :</label>
        <input type="time" name="heure_fin" value="" onchange="majCourt(this)" required >

        <label for="court">Court :</label>
        <select id="courts" class="" name="court" required>
        </select>

        <input type="submit" name="reserver" value="Réserver">

      </form>
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
      <li class="marginBottom10"><a href="../view/stands/StandMenu.php" class="linkWhite">Stand tu tournoi</a></li>
      <li><a href="../view/listeVIPControler.php" class="linkWhite">VIP</a></li>

    </ol>
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="../view/contact.php" class="linkWhite">Infos Pratiques et Contact</a></li>
      <li class="marginBottom10"><a href="MoncompteControler.php" class="linkWhite">Se connecter</a></li>
      <li class="marginBottom10"><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>
  </div>
</footer>
