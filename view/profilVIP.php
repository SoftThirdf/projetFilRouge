<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../view/style/VIP.css">
  <link rel="stylesheet" href="../view/style/index.css">
  <title> Profil VIP </title>
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
      <li><a href="listeVIPControler.php" class="linkBlackRouge"> VOIR LES VIP </a></li>
      <li><a href="../view/EchelleVIP.php" class="linkBlackRouge"> PRESENTATION DE L'ECHELLE DE POPULARITE </a></li>
    </ol>
  </nav>
</div>


<?php
  global $tab;
  if ($tab==null) {
    echo "<div style=\"height:30vh;\">
    <h3 style=\"margin-top:5em;\">Désolé il n'y a pas d'informations concernant ce VIP</h3>
    </div>";
  }else{

  $vip = $tab[0];
  $nomPays = strtolower($vip['nationalite_VIP']);
  $lienDrap = "\"../view/img/pays/$nomPays.png\"";

  $id_vip = $vip['id_VIP'];
  $nom_vip = $vip['nom_VIP'];
  $prenom_vip = $vip['prenom_VIP'];
  $lienphoto = "$nom_vip-$prenom_vip.jpg";

?>

  <div id="profilVIP">
    <?php
    if(file_exists("../view/img/imgVIP/imgProfilVIP/$lienphoto")){
      echo "<img src=../view/img/imgVIP/imgProfilVIP/$lienphoto alt=\"vip\" class=\"photoVIP\">";
    }else{
      echo "<img src=../view/img/imgVIP/imgProfilVIP/none.png alt=\"vip\" class=\"photoVIP\">";
    }
    ?>
    <h2>
      <?php
        echo $prenom_vip . " " . $nom_vip . " " ."<img src=$lienDrap alt=\"$nomPays\" class='imgDrap'><br>";
      ?>
    </h2>
    <hr class="sousH2">

    <a href="https://www.instagram.com" target="_blank"><img src="../view/img/imgVIP/insta.png" class="imgreseaux"></a>
    <a href="https://www.facebook.com" target="_blank"><img src="../view/img/imgVIP/fb.png" class="imgreseaux"></a>
    <a href="https://twitter.com" target="_blank"><img src="../view/img/imgVIP/twitter.png" class="imgreseaux"></a>

    <h3><?php echo $vip['popularite_VIP']; ?></h3>
    Type de VIP : <?php echo $vip['type_VIP']; ?> <br>

    <?php if ($vip['nb_grands_chelems'] != 0){ echo "Nombre de Grands chelems : ". $vip['nb_grands_chelems'];} ?> <br>
    <?php if ($vip['classement_ATP_simple'] != 0){ echo "Classement ATP Simple : " . $vip['classement_ATP_simple'];} ?> <br>
    <?php if ($vip['classement_ATP_double'] != 0){ echo "Classement ATP Double: " . $vip['classement_ATP_double'];} ?> <br>
  </div>

<?php
  }
?>

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
