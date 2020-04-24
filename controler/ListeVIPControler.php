<?php

include_once("../model/DAO.class.php");
$tab = $dao->getVIP();

while ($res = $sth -> fetch()) {

include("../view/ListeVIP.php")

}

?>
