<?php
  session_start();

  try {
    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=testdb;charset=utf8', 'root', '');
  }
  catch (Exception $e) {
    die ("Erreur : " . $e -> getMessage());
  }

$reponse = $bdd -> query ("SELECT V.id_VIP, V.nom_VIP, V.prenom_VIP, P.popularite_VIP, V.type_VIP, V.nationalite_VIP, V.nb_grands_chelems, V.classement_ATP_simple, V.classement_ATP_double
FROM vip V, popularite P
WHERE V.id_popularite = P.id_popularite
AND V.nom_VIP LIKE \"François\"
AND V.prenom_VIP LIKE \"Maxime\"

UNION
SELECT V.id_VIP, V.nom_VIP, V.prenom_VIP, P.popularite_VIP, V.type_VIP, V.nationalite_VIP, V.nb_grands_chelems, V.classement_ATP_simple, V.classement_ATP_double
FROM vip V, popularite P
WHERE V.id_popularite = P.id_popularite
AND V.nom_VIP LIKE \"Michel\"
AND V.prenom_VIP LIKE \"Emeline\"

UNION
SELECT V.id_VIP, V.nom_VIP, V.prenom_VIP, P.popularite_VIP, V.type_VIP, V.nationalite_VIP, V.nb_grands_chelems, V.classement_ATP_simple, V.classement_ATP_double
FROM vip V, popularite P
WHERE V.id_popularite = P.id_popularite
AND V.nom_VIP LIKE \"Gökdere\"
AND V.prenom_VIP LIKE \"Özge\"
");

?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style/index.css">
  <link rel="stylesheet" href="../style/VIP.css">
  <link rel="stylesheet" href="../style/StandDedicaceVIP.css">
  <title> Dédicaces </title>
</head>

<body>
  <?php
  if (isset($_SESSION['id']))
  {
    include_once('../headerlogStand.php');
  }
  elseif (isset($_SESSION['admin'])) {
    include_once('../headerAdminStand.php');
  }
  else {
    include_once('../headernotlogStand.php');
  }
  ?>

  <div id="conteneurPage">
    <div id="actualitevip">
      <h2>Venez rencontrer nos VIP pour une séance de dédicace !</h2>
      <hr class="sousH2">
    </div>

    <div id="conteneurProfils">

      <?php

        while ($donnees = $reponse -> fetch()) {

        $nomPays = strtolower($donnees['nationalite_VIP']);
        $lienDrap = "../img/pays/$nomPays.png";

        $id_vip = $donnees['id_VIP'];
        $nom_vip = $donnees['nom_VIP'];
        $prenom_vip = $donnees['prenom_VIP'];
        $lienphoto = "../img/imgVIP/imgProfilVIP/$nom_vip-$prenom_vip.jpg";

      ?>

      <div class="profilVIP">
        <?php
          echo "<img src=$lienphoto alt=\"vip\" class=\"photoVIP\">";
        ?>
        <h3>
        <?php
          echo $prenom_vip . " " . $nom_vip . " " ."<img src=$lienDrap alt=\"$nomPays\" class='imgDrap'><br>";
        ?>
        </h3>
        <hr class="sousH3">

        <a href="https://www.instagram.com" target="_blank"><img src="../img/imgVIP/insta.png" class="rs"></a>
        <a href="https://www.facebook.com" target="_blank"><img src="../img/imgVIP/fb.png" class="rs"></a>
        <a href="https://twitter.com" target="_blank"><img src="../img/imgVIP/twitter.png" class="rs"></a>

        <h3>
          <?php echo $donnees['popularite_VIP']; ?>
        </h3>
        Type de VIP :
        <?php echo $donnees['type_VIP']; ?> <br>

        <?php if ($donnees['nb_grands_chelems'] != 0){ echo "Nombre de Grands chelems : ". $donnees['nb_grands_chelems'];} ?> <br>
        <?php if ($donnees['classement_ATP_simple'] != 0){ echo "Classement ATP Simple : " . $donnees['classement_ATP_simple'];} ?> <br>
        <?php if ($donnees['classement_ATP_double'] != 0){ echo "Classement ATP Double: " . $donnees['classement_ATP_double'];} ?> <br>
      </div>

      <?php
}
?>
    </div>
    <div id="actualitevip">
      <h3>Dédicaces</h3>
      <hr class="sousH3">
      <p>Maxime François tenant du titre de l’Open Sopra Steria, sa compagne Emeline Michel demi-finaliste du grand chelem de Roland Garos sont venus en tant que grands invités à l’Open Sopra Steria !
        Accompagnés par l’excentrique Özge Gökdere, journaliste talentueuse aussi bien connue pour ses qualités d’investigation que son caractère surprenant, qui mène un reportage sur la vie des stars féminines de l’Open !
        Ces trois invités prestigieux offriront aux fans une session de dédicace chaque matin de 10h à 12h afin de pouvoir côtoyer leurs fans !
        C’est un moment unique de passer un moment spécial avec ces célébrités, ne ratez pas cette occasion ! </p>
    </div>
  </div>
</body>

<footer>
  <div id="conteneurNavigationFooter">
    <a href="../../view/index.php" class="s100"><img src="../img/logoOpenFooter.png" alt="logoTournoi" id="logoOpenFooter" class="s100"></a>
  </div>
  <nav id="navigationFooter">
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="../index.php" class="linkWhite">Accueil</a></li>
      <li class="marginBottom10"><a href="../../controler/tournoisSimQuaControler.php" class="linkWhite">Tableaux des tournois</a></li>
      <li class="marginBottom10"><a href="StandMenu.php" class="linkWhite">Stands de l'open</a></li>
      <li class="marginBottom10"><a href="../../controler/listeVIPControler.php" class="linkWhite">VIP</a></li>

    </ol>
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="../contact.php" class="linkWhite">Infos Pratiques et Contact</a></li>
      <li class="marginBottom10"><a href="../reseaux.php" class="linkWhite">Nos réseaux sociaux</a></li>
      <li class="marginBottom10"><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>
  </div>
</footer>
