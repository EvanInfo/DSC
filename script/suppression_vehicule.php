<?php
require_once '../include/entete.inc.php';


$journal = fopen('../log/Journal.log', 'a');

if ($journal) {
    
    $heure = date('d-m-Y H:i:s');

    // Vérifier si la variable POST contient l'ID de l'objet à supprimer
    if (isset($_POST['id'])) {

        $id = $_POST['id'];

        // Récupérer l'URL de l'image de l'objet
        $engin = $typeEnginManager->affichageTypeEnginId($id);
        $enginUrl = $engin['Url_Image'];

        try {
            // Suppression de l'objet dans la base de données
            $typeEnginManager->supprimerTypeEnginId($id);

            // Écrire dans le fichier journal
            $log_message = "[$heure] L'utilisateur a supprimé un objet.\n";
            $log_message .= "[$heure] ID de l'objet supprimé: {$id}\n";
            $log_message .= "[$heure] Chemin de l'objet supprimé: {$enginUrl}\n";
            fwrite($journal, $log_message);

            // Suppression du fichier image de l'objet
            unlink($enginUrl);

            fclose($journal);
            header("Location: ../pages/vehicule.php");
            exit();
        } catch (Exception $e) {
            // Gérer l'erreur en cas d'échec de la suppression
            fclose($journal);
            echo '<p class="custom-margin-top-6">Une erreur est survenue : ' . $e->getMessage() . '</p>';
        }
    } else {
        // Redirection vers la page des véhicules si aucune ID d'objet n'a été fournie
        header("Location: ../pages/vehicule.php");
        fclose($journal);
        exit();
    }

    // Fermer le fichier journal
    fclose($journal);
} else {
    // Gérer l'erreur si l'ouverture du fichier journal a échoué
    error_log("Erreur : Impossible d'ouvrir le fichier journal.", 0);
}

require_once '../include/piedDePage.inc.php';
?>
