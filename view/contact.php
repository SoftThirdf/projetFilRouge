<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style/index.css">
  <link rel="stylesheet" href="style/contact.css">
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

  <div id="conteneurBody" class="marginTop5">

    <h2>Plan d'accès et Contact</h2>
    <hr class="sousH2">
    <div id="conteneurMap">

      <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2782.527740972553!2d4.859131315520533!3d45.780653979106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4ebbb17fa354d%3A0x6b171f8fe8397c22!2sOpen%20Sopra%20Steria%20de%20Lyon!5e0!3m2!1sfr!2sfr!4v1584352404437!5m2!1sfr!2sfr"
        frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

    </div>

    <div id="conteneurContact" class="marginTop5">

      <div id="conteneurCoor">
        <h3>Nos coordonnées</h3>
        <hr class="sousH3">

        <div id="contenerInformationContact">
          <div id="left" class="contenerInform">
            <img src="img/call.png" alt="call" class="logoContact">
            <p>04 78 78 78 78</p>
          </div>

          <div id="right" class="contenerInform marginTop5">
            <img src="img/mail.png" alt="mail" class="logoContact">
            <p>contact@openSopraSteria.fr</p>
          </div>
        </div>
      </div>

      <div id="conteneurForm">

        <h3>Envoyez-nous un message</h3>
        <hr class="sousH3">

        <section id="sectionForm">

          <form action="" method="post">
            <div id="contentInformationContact">

              <div class="contenerBlock">
                <label for="nom">Nom</label>
                <input type="text" id="name" class="inputBlock" required>
              </div>

              <div class="contenerBlock">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" class="inputBlock" required>
              </div>

              <div class="contenerBlock">
                <label for="email">Email</label>
                <input type="email" id="email" class="inputBlock" required>
              </div>

            </div>

            <textarea id="message" maxlength="1000" rows="10" required></textarea>

            <div id="contenerSubmit">
              <input type="submit" id="submit" value="Envoyer">
            </div>
          </form>

        </section>
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
      <li class="marginBottom10"><a href="../controler/tournoisSimQuaControler.php" class="linkWhite">Tableaux des tournois</a></li>
	  <li class="marginBottom10"><a href="stands/StandMenu.php" class="linkWhite">Stands de l'open</a></li>
      <li class="marginBottom10"><a href="../controler/listeVIPControler.php" class="linkWhite">VIP</a></li>

    </ol>
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="contact.php" class="linkWhite">Infos Pratiques et Contact</a></li>
      <li class="marginBottom10"><a href="reseaux.php" class="linkWhite">Nos réseaux sociaux</a></li>
      <li><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>



</footer>

</html>
