<?php
require_once '../include/entete.inc.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['idTypeEngin'], $_POST['libelleEngin'], $_FILES['photo']) && !empty($_POST['idTypeEngin'])) {
        // Génération d'un identifiant unique pour l'image
        $identifiantUnique = substr(uniqid(), 0, 10);        
        $urlPhoto = '../Image/vehicule/' . $identifiantUnique;
      
        // Préparation des données de l'engin pour l'ajout à la base de données
        $enginData = new TypeEngin([
            'id' =>  $_POST['idTypeEngin'],
            'Libelle'=> $_POST['libelleEngin'],
            'Url_Image' => $urlPhoto
        ]);
        print_r($urlPhoto);
        print_r($enginData);
        // Insertion des données dans la base de données
        $typeEnginManager->insererTypeEngin($enginData);
        
        // Vérification si le fichier a bien été téléchargé
        if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            // Téléversement du fichier sur le serveur
            move_uploaded_file($_FILES['photo']['tmp_name'], $urlPhoto);
        } else {
            // Gestion de l'erreur si le fichier n'a pas été correctement téléchargé
            $_SESSION['error_message'] = "Une erreur s'est produite lors du téléchargement du fichier.";
            header("Location: ../pages/ajout_vehicule.php");
            exit(); 
        }

        // Redirection avec un message de succès
        $_SESSION['success_message'] = "L'engin a été créé.";
        header("Location: ../pages/ajout_vehicule.php");
        exit(); 
    } else {
        // Gestion de l'erreur si tous les champs du formulaire ne sont pas remplis
        $_SESSION['error_message'] = "Veuillez remplir tous les champs du formulaire.";
        header("Location: ../pages/ajout_vehicule.php");
        exit(); 
    }
} else {
    // Redirection si le formulaire n'a pas été soumis via POST
    header("Location: ../pages/ajout_vehicule.php");
    exit(); 
}

require_once '../include/piedDePage.inc.php'; 
?>

?>
