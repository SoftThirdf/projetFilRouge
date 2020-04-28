<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style/VIP.css">
  <link rel="stylesheet" href="style/index.css">
  <title>Echelle de popularité</title>
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


  <div id="menuvip">
    <nav id="navigationvip">
      <ol id="navigationvipol">
        <li><a href="../controler/listeVIPControler.php" class="linkBlackRouge"> VOIR LES VIP </a></li>
        <li><a href="EchelleVIP.php" class="linkBlackRouge"> PRESENTATION DE L'ECHELLE DE POPULARITE </a></li>
      </ol>
    </nav>
  </div>


  <div id="echelle" class="echelle">
    <div id="PresentationCategories">
      <h2> Présentation de l'échelle de popularité des VIP </h2>
      <hr class="sousH2">
      <p>Vous retrouverez ici l’échelle des VIP et l’importance (relative*) de chaque catégorie !
        Vous pourrez ainsi facilement repérer les stars ou futures stars du tennis pour finalement venir à leur rencontre et d’éviter les hasbeens de l’évènement ! </p>
    </div>

    <h2> Les différentes catégories de VIP </h2>
    <hr class="sousH2">

    <img src="img/imgVIP/graphEchelleVIP.jpg" alt="vip" class="imgEchelle">

    <div id="ConteneurEchelle">
  <div class="CategoriesVIP">
  <h3> Legendary </h3>
  <hr class="sousH3">
    <p>Les personnes les plus importantes de l’évènement ! Ce sont les personnes que tout le monde connait. Si vous avez la chance d’en rencontrer une, ne perdez pas l’occasion de venir l’aborder ! Nous aurons la chance d’accueillir un Legendary en dédicace lors de cet Open. Ne ratez pas cet évènement !</p>
  <div class="CategoriesVIP">
  <h3> Master </h3>
  <hr class="sousH3">
    <p>Les personnes aux portes de la gloire ! Elles sont très souvent connues du grand public, influentes et possèdent une solide notoriété. Incontournable pour les personnes s’intéressant au tennis. </p>
  </div>
  <div class="CategoriesVIP">
  <h3> Star </h3>
  <hr class="sousH3">
    <p>Les personnes connues de l’ensemble des supporters de tennis ! Anciens grands joueurs, entraineurs d’exception… Ces personnes sont considérées comme faisant partie de l’élite du tennis et de son environnement. </p>
  </div>
  <div class="CategoriesVIP">
  <h3> Famous </h3>
  <hr class="sousH3">
    <p>Les personnes connues par la plupart des supporters de tennis ! Stars de l’ombre, la vraie question est de savoir quand est ce que ces étoiles montantes finiront par briller ou resteront-elles dans l’obscurité ? </p>
  </div>
  <div class="CategoriesVIP">
  <h3> Maestro </h3>
  <hr class="sousH3">
    <p>Seule une minorité de connaisseurs de tennis les connaissent ! Futures « craques » de ce sport, entraineurs ambitieux ou encore futurs grands influenceurs, ne les perdez pas de vues ! Ce seront peut-être un jour de futur pivot de ce sport !</p>
  </div>
  <div class="CategoriesVIP">
  <h3> Hasbeen </h3>
  <hr class="sousH3">
    <p>Les personnes à se méfier de cet évènement ! Personnes en quête de grandeurs ou bien anciennes stars cherchant à regagner leur notoriété d’antan… Il vaut mieux les éviter, elles ont tendance à attirer l’attention du public par tous les moyens. </p>
  </div>
  <div class="CategoriesVIP">
  <h3> Rookie </h3>
  <hr class="sousH3">
  <p>Ces personnes sont uniquement connues par les plus grands connaisseurs de ce sport. Très souvent des débutants confirmés dans ce sport. Leur nombre est tel qu’il est difficile d’identifier parmi elle s’il existe, ou non, de futurs génies. </p>
  </div>
  <div class="CategoriesVIP">
  <h3> Novice </h3>
  <hr class="sousH3">
    <p>Personnes presque inconnues, majoritairement des personnes n’ayant jamais décollé ou des débutants dans ce domaine. Il se peut même que votre voisin de palier en soit un !</p>
  </div>
  <div class="CategoriesVIP">
  <h3> Unknown </h3>
  <hr class="sousH3">
    <p>Personnes totalement inconnues. Débutants ou personnes n’ayant jamais décollé ? Vous pouvez en croiser tous les jours mais peut-être que parmi ces personnes se cachent la future star de demain !</p>
  </div>
</div>
  </div>

  <div class="remarque">
    *Cette échelle a pour but de divertir, elle n’est pas à prendre aux sérieux
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
      <li class="marginBottom10"><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>
  </div>
</footer>

</html>
