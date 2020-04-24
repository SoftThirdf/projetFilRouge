<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../view/style/index.css">
  <link rel="stylesheet" href="../view/style/VIP.css">
  <title> VIP </title>
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


<div id="menuvip">
  <nav id="navigationvip">
    <ol id="navigationvipol">
      <li><a href="../controler/ListeVIPControler.php" class="linkBlackRouge"> VOIR LES VIP </a></li>
      <li><a href="../view/EchelleVIP.php" class="linkBlackRouge"> PRESENTATION DE L'ECHELLE DE POPULARITE </a></li>
    </ol>
  </nav>
</div>


<div id="conteneurDivVIP">

  <?php
  while ($donnees = $req->fetch()) {

    $id_vip = $donnees['id_VIP'];
    $nom_vip = $donnees['nom_VIP'];
    $prenom_vip = $donnees['prenom_VIP'];
    $popularite = $donnees['popularite_VIP'];
    $lienVIP = "../view/Profils VIP/$id_vip-$nom_vip-$prenom_vip.php";

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
  $req->closeCursor();
  ?>


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
      <li class="marginBottom10"><a href="../controler/tournoisSimQuaControler.php" class="linkWhite">Tableaux des tournois</a></li>
	  <li class="marginBottom10"><a href="../view/stands/StandMenu.html" class="linkWhite">Stands de l'open</a></li>
      <li class="marginBottom10"><a href="../controler/ListeVIPControler.php" class="linkWhite">VIP</a></li>

    </ol>
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="../view/contact.php" class="linkWhite">Infos Pratiques et Contact</a></li>
      <li class="marginBottom10"><a href="../controler/MoncompteControler.php" class="linkWhite">Se connecter</a></li>
      <li class="marginBottom10"><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>
  <!-- </div> -->


</footer>
</html>
