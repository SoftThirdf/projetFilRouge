<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="../view/style/Moncompte1.css">
  <link type="text/css" rel="stylesheet" href="../view/style/Motdepassemodifie.css">
  <title>Mon Compte</title>
</head>

<body>
  <?php
  include_once('../view/headerlog.php');
  ?>

  <div id="corps">
    <!-- C'est ici que l'on met le corps de la page -->
    <div class="modif">
      <h1>Votre mot de passe a bien été modifié</h1>
    </div>
  </div>

</body>
</html>
