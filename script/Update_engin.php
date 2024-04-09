<?php
require_once '../include/entete.inc.php';

// Vérification si le formulaire a été soumis via la méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification des champs du formulaire
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $engin = $typeEnginManager->affichageTypeEnginId($_POST['id']);
        
        $id = $engin['id'];
        $libelle = $engin['Libellé'];
        $urlPhoto = $engin['Url_Image'];

        if (isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) {
            unlink($urlPhoto);
            $identifiantUnique = substr(uniqid(), 0, 10);
            $urlPhoto = '../Image/vehicule/' . $identifiantUnique;
        }

        if (isset($_POST['libelleEngin']) && !empty($_POST['libelleEngin'])) {
            $libelle = $_POST['libelleEngin'];
        }

        // Modification des données dans la base de données

        $enginData = new TypeEngin([
            'id' => $id,
            'Libelle' =>  $libelle,
            'Url_Image' => $urlPhoto
        ]);

        $typeEnginManager->updateTypeEnginId($enginData);

        // Vérification si le fichier a bien été téléchargé
        if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            // Téléversement du fichier sur le serveur
            move_uploaded_file($_FILES['photo']['tmp_name'], $urlPhoto);
        }

        // Redirection avec un message de succès
        $_SESSION['success_message'] = "L'engin a été modifié.";
        header("Location: ../pages/Vehicule.php");
        exit();
    }
} else {
    // Gestion de l'erreur si l'id n'est pas correcte
    $_SESSION['error_message'] = "L/'id n/'est pas correcte";
    header("Location: ../pages/Vehicule.php");
    exit();
}

require_once '../include/piedDePage.inc.php';
?>
