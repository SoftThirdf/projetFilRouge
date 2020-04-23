<?php
try {
  $bdd = new PDO('mysql:host=localhost;dbname=testdb;charset=utf8', 'root', 'root');
}
catch (Exception $e) {
  die ("Erreur : " . $e -> getMessage());
}

$reponse = $bdd -> query ("SELECT V.id_VIP, V.nom_VIP, V.prenom_VIP, P.popularite_VIP, V.type_VIP, V.nationalite_VIP, V.nb_grands_chelems, V.classement_ATP_simple, V.classement_ATP_double FROM vip V, popularite P WHERE V.id_popularite = P.id_popularite AND V.id_VIP = 1;");

while ($donnees = $reponse -> fetch()) {
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style/VIP.css">
  <link rel="stylesheet" href="../style/index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title> <?php echo $donnees['prenom_VIP'] . " " .$donnees['nom_VIP']; ?></title>
</head>

<body>
  <header class="s100" id="haut">
    <div id="conteneurNavigation">
      <div id="conteneurLogoMenu">
        <a href="../view/index.php" class="s100"><img src="../img/logoOpen.png" alt="logoTournoi" id="logoOpen" class="s100"></a>
      </div>
      <nav id="navigation">
        <ol id="navigationOl">
          <li> <a href="../index.php" class="linkBlackRouge">ACCUEIL</a></li>
          <li><a href="../../controler/tournoisSimQuaControler.php" class="linkBlackRouge">TABLEAUX DES TOURNOIS</a></li>
          <li><a href="../stands/StandMenu.php" class="linkBlackRouge">STAND DU TOURNOI</a></li>
          <li><a href="../ListeVIP.php" class="linkBlackRouge">VIP</a></li>
        </ol>
      </nav>
      <div id="conteneurConnexionMenu">

        <a href="../../controler/MoncompteControler.php" class="linkBlack btn" id="btnConnexion">
          <div>Connexion</div>
        </a>

        <a href="#" class="linkBlack btn" id="btnInscription">
          <div>S'inscrire </div>
        </a>

      </div>
    </div>
  </header>
<div id="menuvip">
  <nav id="navigationvip">
    <ol id="navigationvipol">
      <li><a href="../ListeVIP.php" class="linkBlackRouge"> VOIR LES VIP </a></li>
      <li><a href="../EchelleVIP.php" class="linkBlackRouge"> PRESENTATION DE L'ECHELLE DE POPULARITE </a></li>
    </ol>
  </nav>
</div>


<?php
$nomPays = strtolower($donnees['nationalite_VIP']);
$lienDrap = "\"../img/pays/$nomPays.png\"";

$id_vip = $donnees['id_VIP'];
$nom_vip = $donnees['nom_VIP'];
$prenom_vip = $donnees['prenom_VIP'];
$lienphoto = "../img/imgVIP/imgProfilVIP/$id_vip-$nom_vip-$prenom_vip.jpg";

 ?>

  <div id="profilVIP">
    <?php
    echo "<img src=$lienphoto alt=\"vip\" class=\"photoVIP\">";
    ?>
    <h2>
      <?php
        echo $prenom_vip . " " . $nom_vip . " " ."<img src=$lienDrap alt=\"$nomPays\" class='imgDrap'><br>";
      ?>
    </h2>
    <hr class="sousH2">

    <a href="https://www.instagram.com" target="_blank"><img src="../img/imgVIP/1024px-Instagram_simple_icon.svg.png" class="imgreseaux"></a>
    <a href="https://www.facebook.com" target="_blank"><img src="../img/imgVIP/Facebook-Logo.png" class="imgreseaux"></a>
    <a href="https://twitter.com" target="_blank"><img src="../img/imgVIP/Twitter_Bird.svg.png" class="imgreseaux"></a>

    <h3><?php echo $donnees['popularite_VIP']; ?></h3>
    Type de VIP : <?php echo $donnees['type_VIP']; ?> <br>

    <?php if ($donnees['nb_grands_chelems'] != 0){ echo "Nombre de Grands chelems : ". $donnees['nb_grands_chelems'];} ?> <br>
    <?php if ($donnees['classement_ATP_simple'] != 0){ echo "Classement ATP Simple : " . $donnees['classement_ATP_simple'];} ?> <br>
    <?php if ($donnees['classement_ATP_double'] != 0){ echo "Classement ATP Double: " . $donnees['classement_ATP_double'];} ?> <br>
  </div>

<?php
}
?>

<div id="actualitevip">
  <h3>Actualité</h3>
  <hr class="sousH3">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    Duis
    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>

</body>

<footer>
  <div id="conteneurNavigationFooter">
    <a href="../view/index.php" class="s100"><img src="../img/logoOpenFooter.png" alt="logoTournoi" id="logoOpenFooter" class="s100"></a>
  </div>
  <nav id="navigationFooter">
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="../index.php" class="linkWhite">Accueil</a></li>
      <li class="marginBottom10"><a href="../../controler/tournoisSimQuaControler.php" class="linkWhite">Tableau du tournoi</a></li>
      <li class="marginBottom10"><a href="../stands/StandMenu.php" class="linkWhite">Stand tu tournoi</a></li>
      <li><a href="../ListeVIP.php" class="linkWhite">VIP</a></li>

    </ol>
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="../contact.php" class="linkWhite">Infos Pratiques et Contact</a></li>
      <li class="marginBottom10"><a href="../../controler/MoncompteControler.php" class="linkWhite">Se connecter</a></li>
      <li class="marginBottom10"><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>
  </div>
</footer>
