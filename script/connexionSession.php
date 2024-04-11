<?php
include("../include/entete.inc.php");

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($utilisateur=$userManager->getUser($_POST['mail']))
  {
    if ($utilisateur['mdp'] == md5($_POST['motDePasse1']))
    {
      session_start ();
      $_SESSION['login'] = true;
      $_SESSION['TypeUtilisateur'] = $utilisateur['type'];
      /*$_SESSION['NomUtilisateur'] = $utilisateur->getPrenom();
      $_SESSION['idUser'] = $manager->getIdUser($_POST['mail']);*/
      header('Location: ../pages/accueil.php');
    }else{
      //echo "<div class='container'>";
      //echo "<p>Le mot de passe fourni est : " . md5($_POST['motdepasse']) . "</p>";
      $_SESSION['erreur_mdp'] = "Mot de passe incorrect";
      header('Location: ../pages/connexion.php');
      
    }
  }else{
    header('Location: ../pages/connexion.php');
    $_SESSION['erreur_mail'] = "Mail invalide";
  }
}

include ("../include/piedDePage.inc.php");
?>