
      <?php
       if (isset($_POST['mdp'])&&isset($_POST['login']))
       {
         if($_POST['login']=="filrouge@iae.fr"&&$_POST['mdp']=="filrouge")
         {
         include('Moncompte.html');
         } else  {echo "Identifiant ou mot de passe incorrect";
                 }
       else {
         echo "Echec de connexion";
       }
       ?>
