<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>
        <h1>Mon super blog !</h1>
        <p>Derniers billets du blog :</p>


        <?php
        // while ($donnees = $req->fetch())
        foreach($res as $value)
        {
          $match = $donnees['id_Match'];
          $libelle = $donnees['libelle_match'];
          $type = $donnees['type_match'];
        ?>
        <div class="news">
            <h3>
                <?php echo $match; ?>
                <em>le <?php echo $libelle; ?></em>
            </h3>

            <p>
            <?php
            echo $type;
            ?>
            <br />
            <em><a href="#">Commentaires</a></em>
            </p>
        </div>
        <?php
        }
        $req->closeCursor();
        ?>
    </body>
</html>
