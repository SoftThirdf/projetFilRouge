<?php
session_start();

if (isset($_SESSION['id']))
{
include_once('../view/infos.php');
}
else {
include_once('../view/MonCompte.php');
}
?>
