<?php
include("../include/entete.inc.php");

session_destroy();


header("Location: ../pages/accueil.php");
exit();
include ("../include/piedDePage.inc.php");
?>