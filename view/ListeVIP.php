<?php
try {
  $bdd = new PDO('mysql:host=localhost;port=8889;dbname=testdb;charset=utf8', 'root', 'root');
}
catch (Exception $e) {
  die ("Erreur : " . $e -> getMessage());
}

  $reponse = $bdd->query('SELECT V.id_VIP, V.nom_VIP, V.prenom_VIP, P.popularite_VIP FROM vip V, popularite P WHERE V.id_Popularite = P.id_Popularite ORDER BY P.id_popularite DESC');

?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style/index.css">
  <link rel="stylesheet" href="style/VIP.css">
  <title> VIP </title>
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

  <div id="conteneurPage">


<div id="menuvip">
  <nav id="navigationvip">
    <ol id="navigationvipol">
      <li><a href="ListeVIP.php" class="linkBlackRouge"> VOIR LES VIP </a></li>
      <li><a href="EchelleVIP.php" class="linkBlackRouge"> PRESENTATION DE L'ECHELLE DE POPULARITE </a></li>
    </ol>
  </nav>
</div>

<div id="conteneurDivVIP">


<?php
while ($donnees = $reponse -> fetch()) {

$id_vip = $donnees['id_VIP'];
$nom_vip = $donnees['nom_VIP'];
$prenom_vip = $donnees['prenom_VIP'];
$popularite = $donnees['popularite_VIP'];
$lienVIP = "Profils VIP/$id_vip-$nom_vip-$prenom_vip.php";


?>

<div id="presentlistevip">
			<div class="listevip">
				<?php
						echo "<a href='$lienVIP' class='linkBlackOrange'> $prenom_vip $nom_vip <br> $popularite </a>";
				?>
		</div>
</div>

	<?php
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
      <li class="marginBottom10"><a href="index.php" class="linkWhite">Accueil</a></li>
      <li class="marginBottom10"><a href="../controler/tournoisSimQuaControler.php" class="linkWhite">Tableaux des tournois</a></li>
	  <li class="marginBottom10"><a href="stands/StandMenu.php" class="linkWhite">Stands de l'open</a></li>
      <li class="marginBottom10"><a href="ListeVIP.php" class="linkWhite">VIP</a></li>

    </ol>
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="contact.php" class="linkWhite">Infos Pratiques et Contact</a></li>
      <li class="marginBottom10"><a href="reseaux.php" class="linkWhite">Nos réseaux sociaux</a></li>
      <li class="marginBottom10"><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>
  <!-- </div> -->


</footer>
