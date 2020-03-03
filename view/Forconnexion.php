<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../view/style/Forconnexion.css">
    <title>Connexion</title>
  </head>
  <body >

    <div class="conteneur">
      <div class="img">
        <div align="center">
        <img src="../view/img/Connexion.jpg" class="essai">
       <form action="Moncompte.php" method="post">
       <tr>
       <td>Adresse mail</td>
       <td><input type="text" name="login"></br>
       </td>
       </tr>
       <tr>
       <td>Mot de passe</td>
       <td><input type="password" name="mdp"></br>
       </td>
       </tr>
       <tr>
       <td><input type="submit" value="Connexion">
       </td>
       </tr>
       </form>
       </div>
  </body>
</html>
