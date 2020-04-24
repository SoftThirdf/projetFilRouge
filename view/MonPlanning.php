<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="../view/style/Moncompte1.css">
  <link type="text/css" rel="stylesheet" href="../view/style/infos.css">
  <link rel="stylesheet" href="../view/style/Planning.css">
  <title>Mon Planning</title>
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


<div class="principale">

       <div id="info">
       <h2>Mes match</h2>
       <hr class="sousH2">
     </div>

     <div id="info">
       <h3> <?php echo $donnees['date_']; ?> </h3>
       <hr class="sousH3">
     </div>

     <div id="conteneurplanning">
       <div class="equipe1">
         <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] . "<br>" . $_SESSION['equipe']; ?>
       </div>

       <div class="infostournoi">
         <?php echo "Match n°" . $match['id'] . "<br>"; ?>
         Court :
         <?php echo $donnees['libelle_court'] . "<br>"; ?>
         Heure :
         <?php echo $donnees['heure_debut']; ?>
       </div>

       <div class="equipe2">
         <?php echo $donnees['nom_joueur2'] . " " . $donnees['prenom_joueur2'] . " " . $donnees['nom_equipe2']; ?>
       </div>
     </div>
</div>




     <!-- <div class="informations">
       <div class="titre"><h2>Mes informations personelles</h2></div>
       <h3>Prénom: <?php
       // $nom=$_SESSION['nom'];
       // $nationalite=$_SESSION['nationalite'];
       // echo $prenom;?><br></h3>
       <h3>Nom: <?php //echo $nom;?><br></h3>
       <h3>Nationalité: <?php //echo $nationalite;
         //echo"
          //<img src=../view/img/pays/$nationalite.png alt=\"$nationalite\">";
       ?><br></h3>
     </div>
     <div class="identifiants">
       <div class="titre"><h2>Mes identifiants</h2>
       </div>
       <h3>Login: <?php
         //$Login=$_SESSION['login'];
        //echo $Login;
        ?></h3>
        <div id="btnInscription" class="btn">
       <a href="../view/mdp.php" class="linkBlack">Modifier mon mot de passe</a></li>
     </div>
   </div>
 </div>
  </div> -->

</body>

<footer>
  <div id="conteneurNavigationFooter">
    <a href="../view/index.php" class="s100"><img src="../view/img/logoOpenFooter.png" alt="logoTournoi" id="logoOpenFooter" class="s100"></a>
  </div>
  <nav id="navigationFooter">
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="index.php" class="linkWhite">Accueil</a></li>
      <li class="marginBottom10"><a href="../controler/tournoisSimQuaControler.php" class="linkWhite">Tableaux des tournois</a></li>
	  <li class="marginBottom10"><a href="stands/StandMenu.html" class="linkWhite">Stands de l'open</a></li>
      <li class="marginBottom10"><a href="ListeVIP.php" class="linkWhite">VIP</a></li>

    </ol>
    <ol class="navigationFooterOl">
      <li class="marginBottom10"><a href="contact.php" class="linkWhite">Infos Pratiques et Contact</a></li>
      <li class="marginBottom10"><a href="../controler/MoncompteControler.php" class="linkWhite">Se connecter</a></li>
      <li class="marginBottom10"><a href="#haut" class="linkWhite">Revenir en haut de la page</a></li>

    </ol>
  </nav>
  </div>


</footer>

</html>
