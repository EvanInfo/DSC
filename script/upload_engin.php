<?php
require_once '../include/entete.inc.php';

// Vérification si le formulaire a été soumis via la méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification des champs du formulaire
    if (isset($_POST['idTypeEngin'], $_POST['libelleEngin'], $_FILES['photo']) && !empty($_POST['idTypeEngin'])) {
        // Génération d'un identifiant unique pour l'image
        $identifiantUnique = substr(uniqid(), 0, 10);
        $urlPhoto = '../Image/vehicule/' . $identifiantUnique;

        // Vérification si l'engin existe déjà dans la base de données
        $typeEngins = $typeEnginManager->affichageTypeEngin();
        $enginExiste = false;
        foreach ($typeEngins as $typeEngin) {
            if ($typeEngin['id'] === $_POST['idTypeEngin']) {
                $enginExiste = true;
                break;
            }
        }
        if ($enginExiste) {
            $_SESSION['error_message'] = "L'engin existe déjà.";
            header("Location: ../pages/ajout_vehicule.php");
            exit();
        } else {
            // Préparation des données de l'engin pour l'ajout à la base de données
            $enginData = new TypeEngin([
                'id' => $_POST['idTypeEngin'],
                'Libelle' => $_POST['libelleEngin'],
                'Url_Image' => $urlPhoto
            ]);

            // Insertion des données dans la base de données
            $typeEnginManager->insererTypeEngin($enginData);

            // Vérification si le fichier a bien été téléchargé
            if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                // Téléversement du fichier sur le serveur
                move_uploaded_file($_FILES['photo']['tmp_name'], $urlPhoto);

                // Redirection avec un message de succès
                $_SESSION['success_message'] = "L'engin a été créé.";
                header("Location: ../pages/ajout_vehicule.php");
                exit();
            } else {
                // Gestion de l'erreur si le fichier n'a pas été correctement téléchargé
                $_SESSION['error_message'] = "Une erreur s'est produite lors du téléchargement du fichier.";
                header("Location: ../pages/ajout_vehicule.php");
                exit();
            }
        }
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
