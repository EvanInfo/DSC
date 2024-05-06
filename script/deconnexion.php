<?php
include("../include/entete.inc.php");

session_destroy();

// Script permettant la deconnexion d'un utilisateur
header("Location: ../pages/accueil.php");
exit();
include ("../include/piedDePage.inc.php");
?>