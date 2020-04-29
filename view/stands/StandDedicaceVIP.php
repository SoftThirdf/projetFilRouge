<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../view/style/index.css">
  <link rel="stylesheet" href="../view/style/VIP.css">
  <link rel="stylesheet" href="../view/style/StandDedicaceVIP.css">
  <title> Dédicaces </title>
</head>

<body>
  <?php
  if (isset($_SESSION['id']))
  {
    include_once('../view/header.php');
  }
  elseif (isset($_SESSION['admin'])) {
    include_once('../view/headerAdmin.php');
  }
  else {
    include_once('../view/headernotlog.php');
  }
  ?>

  <div id="conteneurPage">
    <div id="actualitevip">
      <h2>Venez rencontrer nos VIP pour une séance de dédicace !</h2>
      <hr class="sousH2">
    </div>

    <div id="conteneurProfils">

      <?php
        global $tab;

        if ($tab==null) {
          echo "<div style=\"height:30vh;\">
          <h3 style=\"margin-top:5em;\">Désolé il n'y a pas d'informations concernant ces VIPs</h3>
          </div>";
        }else{

        foreach ($tab as $key => $vip) {

        $nomPays = strtolower($vip['nationalite_VIP']);
        $lienDrap = "../view/img/pays/$nomPays.png";

        $id_vip = $vip['id_VIP'];
        $nom_vip = $vip['nom_VIP'];
        $prenom_vip = $vip['prenom_VIP'];
        $lienphoto = "$nom_vip-$prenom_vip.jpg";

      ?>

      <div class="profilVIP">
        <?php
        if(file_exists("../view/img/imgVIP/imgProfilVIP/$lienphoto")){
          echo "<img src=../view/img/imgVIP/imgProfilVIP/$lienphoto alt=\"vip\" class=\"photoVIP\">";
        }else{
          echo "<img src=../view/img/imgVIP/imgProfilVIP/none.png alt=\"vip\" class=\"photoVIP\">";
        }
        ?>
        <h3>
        <?php
          echo $prenom_vip . " " . $nom_vip . " " ."<img src=$lienDrap alt=\"$nomPays\" class='imgDrap'><br>";
        ?>
        </h3>

        <a href="https://www.instagram.com" target="_blank"><img src="../view/img/imgVIP/insta.png" class="rs"></a>
        <a href="https://www.facebook.com" target="_blank"><img src="../view/img/imgVIP/fb.png" class="rs"></a>
        <a href="https://twitter.com" target="_blank"><img src="../view/img/imgVIP/twitter.png" class="rs"></a>

        <h3>
          <?php echo $vip['popularite_VIP']; ?>
        </h3>
        Type de VIP :
        <?php echo $vip['type_VIP']; ?> <br>

        <?php if ($vip['nb_grands_chelems'] != 0){ echo "Nombre de Grands chelems : ". $vip['nb_grands_chelems'];} ?> <br>
        <?php if ($vip['classement_ATP_simple'] != 0){ echo "Classement ATP Simple : " . $vip['classement_ATP_simple'];} ?> <br>
        <?php if ($vip['classement_ATP_double'] != 0){ echo "Classement ATP Double: " . $vip['classement_ATP_double'];} ?> <br>
      </div>

      <?php
        }
      }
      ?>
    </div>
    <div id="actualitevip">
      <h3>Dédicaces</h3>
      <hr class="sousH3">
      <p>Maxime François, tenant du titre de l’Open Sopra Steria, et sa compagne Emeline Michel, demi-finaliste du grand chelem de Roland Garos sont venus en tant que grands invités à l’Open Sopra Steria !
        Accompagnés par l’excentrique Özge Gökdere, journaliste talentueuse aussi bien connue pour ses qualités d’investigation que son caractère surprenant, qui mène un reportage sur la vie des stars féminines de l’open !
        Ces trois invités prestigieux offriront aux fans une session de dédicaces chaque matin de 10h à 12h afin de pouvoir côtoyer leurs fans !
        C’est une occasion unique de passer un moment spécial avec ces célébrités, ne ratez pas cette occasion ! </p>
    </div>
  </div>
</body>

<footer>
  <div id="conteneurNavigationFooter">
    <a href="../../view/index.php" class="s100"><img src="../view/img/logoOpenFooter.png" alt="logoTournoi" id="logoOpenFooter" class="s100"></a>
  </div>
  <nav id="navigationFooter">
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="../view/index.php" class="linkWhite">Accueil</a></li>
      <li class="marginBottom10"><a href="controler/tournoisSimQuaControler.php" class="linkWhite">Tableaux des tournois</a></li>
      <li class="marginBottom10"><a href="../view/StandMenu.php" class="linkWhite">Stands de l'open</a></li>
      <li class="marginBottom10"><a href="controler/listeVIPControler.php" class="linkWhite">VIP</a></li>

    </ol>
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="../view/contact.php" class="linkWhite">Infos Pratiques et Contact</a></li>
      <li class="marginBottom10"><a href="../view/reseaux.php" class="linkWhite">Nos réseaux sociaux</a></li>
      <li class="marginBottom10"><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>
  </div>
</footer>
