<?php
try {
  $bdd = new PDO('mysql:host=localhost;dbname=testdb;charset=utf8', 'root', 'root');
}
catch (Exception $e) {
  die ("Erreur : " . $e -> getMessage());
}

$reponse = $bdd->query('SELECT V.id_VIP, V.nom_VIP, V.prenom_VIP, P.popularite_VIP FROM vip V, popularite P WHERE V.id_Popularite = P.id_Popularite ORDER BY P.id_popularite DESC');

?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/VIP.css">
  <link rel="stylesheet" href="style/index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title> VIP </title>
</head>

<body>
  <header class="s100" id="haut">
    <div id="conteneurNavigation">
      <div id="conteneurLogoMenu">
        <a href="index.php" class="s100"><img src="img/logoOpen.png" alt="logoTournoi" id="logoOpen" class="s100"></a>
      </div>
      <nav id="navigation">
        <ol id="navigationOl">
          <li> <a href="index.php" class="linkBlackRouge">ACCUEIL</a></li>
          <li><a href="../controler/tournoisSimQuaControler.php" class="linkBlackRouge">TABLEAUX DES TOURNOIS</a></li>
		  <li><a href="StandMenu.html" class="linkBlackRouge">STANDS DE L'OPEN </a></li>
          <li><a href="ListeVIP.php" class="linkBlackRouge">VIP</a></li>
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

<div id="menuvip">
  <nav id="navigationvip">
    <ol id="navigationvipol">
      <li><a href="ListeVIP.php" class="linkBlackRouge"> VOIR LES VIP </a></li>
      <li><a href="EchelleVIP.html" class="linkBlackRouge"> PRESENTATION DE L'ECHELLE DE POPULARITE </a></li>
    </ol>
  </nav>
</div>
</div>


<?php
while ($donnees = $reponse -> fetch()) {

$id_vip = $donnees['id_VIP'];
$nom_vip = $donnees['nom_VIP'];
$prenom_vip = $donnees['prenom_VIP'];
$popularite = $donnees['popularite_VIP'];
$lienVIP = "Profils VIP/$id_vip-$nom_vip-$prenom_vip.php";


?>

<div id="presentlistevip">

	<a href="$lienVIP" class="linkBlackOrange">
			<div class="listevip">
				<?php
						echo "<a href='$lienVIP' class='linkBlackOrange'> $prenom_vip $nom_vip <br> $popularite </a>";
				?>
			</div>
		</a>

</div>

	<?php
}

?>

</body>

<footer>
  <div id="conteneurNavigationFooter">
    <a href="index.php" class="s100"><img src="../view/img/logoOpenFooter.png" alt="logoTournoi" id="logoOpenFooter" class="s100"></a>
  </div>
  <nav id="navigationFooter">
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="index.php" class="linkWhite">Accueil</a></li>
      <li class="marginBottom10"><a href="../controler/tournoisSimQuaControler.php" class="linkWhite">Tableaux des tournois</a></li>
	  <li class="marginBottom10"><a href="StandMenu.html" class="linkWhite">Stands de l'open</a></li>
      <li class="marginBottom10"><a href="ListeVIP.php" class="linkWhite">VIP</a></li>

    </ol>
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="contact.php" class="linkWhite">Infos Pratiques et Contact</a></li>
      <li class="marginBottom10"><a href="../controler/MoncompteControler.php" class="linkWhite">Se connecter</a></li>
      <li class="marginBottom10"><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>
  <!-- </div> -->


</footer>
