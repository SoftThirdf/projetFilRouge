<?php
session_start();
session_unset();
session_destroy();
include('../view/index.php');
?>
