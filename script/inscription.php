<?php
include("../include/entete.inc.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    try {
        if ($_POST['motDePasse1'] !== $_POST['motDePasse2']) {
            $_SESSION['erreurMotDePasse'] = "Les mots de passe ne sont pas identiques.";
            header("Location: ../pages/inscription.php");
            exit();
        }
        if ($userManager->getUser($_POST['mail']))
        {
            $_SESSION['erreurMail'] = "Le mail existe déjà.";
            header("Location: ../pages/inscription.php");
            exit();
        }
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['mail'];
        $mdp = $_POST['motDePasse1'];

        $utilisateur = new User([
           'nom' =>  $nom,
           'prenom' =>  $prenom,
           'mail' => $email,
           'mdp' => $mdp
        ]);

        $userManager ->add($utilisateur);
        $journal = fopen('../log/Journal.log', 'a');

        if ($journal) {
            // Récupération de l'heure actuelle
            $heure = date('d-m-Y H:i:s');

            // Construction du message de journal
            $log_message = "[$heure] Nouvel utilisateur inscrit.\n";
            $log_message .= "[$heure] Nom: $nom\n";
            $log_message .= "[$heure] Prénom: $prenom\n";
            $log_message .= "[$heure] Email: $email\n";
            $log_message .= "[$heure] Type: " . $userManager -> getType($email) ."\n";

            // Écriture du message de journal dans le fichier
            fwrite($journal, $log_message);

            // Fermeture du fichier journal
            fclose($journal);
        } else {
            // Gérer l'erreur si l'ouverture du fichier journal a échoué
            error_log("Erreur : Impossible d'ouvrir le fichier journal pour l'inscription.", 0);
            header('Location: ../pages/accueil.php');
        }
        $_SESSION['success_message'] = "L'utilisateur a été crée.";
        header('Location: ../pages/inscription.php');
        exit();
       
    }catch (InvalidArgumentException $e) {
        
        $_SESSION['erreur_formulaire'] = "Une erreur est survenue : " . $e->getMessage();
        header('Location: ../pages/inscription.php');
        exit();
    }
}

include ("../include/piedDePage.inc.php");
?>