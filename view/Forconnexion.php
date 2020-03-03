<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="connexion.css">
    <title>Connexion</title>
  </head>
  <body>
    <div "conteneur">
      <?php
       if (isset($_POST['mdp'])&&isset($_POST['login']))
       {
         if($_POST['login']=="filrouge@iae.fr"&&$_POST['mdp']=="filrouge")
         {
        echo"<a href=\"Moncompte.html\"></a>";
         }
       }
       else {
         echo "Identifiant ou mot de passe incorrect";
       }
       ?>
     </div>
       <form action="Forconnexion.php" method="post">
       <tr>
       <td>Adresse mail</td>
       <td><input type="text" name="login">
       </td>
       </tr>
       <tr>
       <td>Mot de passe</td>
       <td><input type="password" name="mdp">
       </td>
       </tr>
       <tr>
       <td><input type="submit" value="Connexion">
       </td>
       </tr>
       </form>
  </body>
</html>
