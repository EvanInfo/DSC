<?php
require_once '../include/entete.inc.php';

 if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $engin = $typeEnginManager -> affichageTypeEnginId($id);
        $enginUrl =  $engin['Url_Image'];
        try {
            $typeEnginManager->supprimerTypeEnginId($id);
       
            header("Location: ../pages/vehicule.php");
            unlink($enginUrl);
            exit();
        } catch (Exception $e) {
            //echo "<p class='custom-margin-top-6'>Une erreur est survenue : " . $e->getMessage() . "</p>";
            echo '<p class="custom-margin-top-6">Aucun engin supprimée.</p>';
        }
    }else{
        header("Location: ../pages/vehicule.php");
        exit();
    }

require_once '../include/piedDePage.inc.php';
?>
