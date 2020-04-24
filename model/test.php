<?php

function getVIP2() {
  $bdd = new PDO('mysql:host=localhost;port=8889;dbname=testdb;charset=utf8', 'root', 'root');
  $req = $bdd->query('SELECT V.id_VIP, V.nom_VIP, V.prenom_VIP, P.popularite_VIP FROM vip V, popularite P WHERE V.id_Popularite = P.id_Popularite ORDER BY P.id_popularite DESC');
  return $req;
}

?>
