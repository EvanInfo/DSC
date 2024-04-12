<?php
include("../include/entete.inc.php");

if (isset($_SESSION['login']) && $_SESSION['login'] == false ){
    header('Location: ../pages/connexion.php');}
?>
<div class="container custom-margin-top-3 ">
    <div class=" entete-page-color">
      <?php echo generationEntete("Gestion des véhicules","") ?>
      <div class="row justify-content-center entete-page">
        <p class="text-center">Formulaire pemettant d'ajouter des véhicules au casernes.</p>
      </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-4 mx-auto">
                <div class="card-deck">
                    <div class="card bg-light border-dark">
                        <img id="apercuImage" class="card-img-top cardTailleGestionVehicule" src="../Image/optimus.png" alt="Photo" />

                    </div>
                </div>
            </div>
        </div>
     
        <form id="myForm" action="../script/update_Engin.php" method="post" enctype="multipart/form-data" class="border p-4  custom-margin-top-1 gestionVehiculeForm " novalidate>
            <input type="hidden" name="id" value="">
                
                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Véhicule</label>
                                <select id="vehicule" class="form-control " name="vehicule"  required>
                                    <option value="" disabled selected>Choisissez un véhicule</option>
                                    <?php
                                        $vehicule =  $typeEnginManager->affichageTypeEngin();

                                    // Générer le menu HTML
                                    foreach ($vehicule as $vehicules) {
                                        echo '<option value="' . $vehicules['id'] . '">' . $vehicules['Libellé'] . '</option>';
                                        
                                    }
                                    ?>
                                </select>    
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Caserne</label>
                                <select id="Caserne" class="form-control " name="Caserne" oninput="validateCaserne()" required>
                                    <option value="" disabled selected>Choisissez une caserne</option>
                                    <?php
                                    $listeCaserne = $caserneManager->getCaserne();

                                    // Générer le menu HTML
                                    foreach ($listeCaserne as $caserne) {
                                        echo '<option value="' . $caserne['id'] . '">' . $caserne['Nom'] . '</option>';
                                        
                                    }
                                    ?>
                                </select>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group text-center">
                        <label for="numeroEngin">Numéro de l'engin</label>
                        <input type="number" class="numeroEngin form-control" name="numeroEngin" id="numeroEngin" required>
                        <div class="invalid-feedback">
                            Le champ Numéro de l'engin est obligatoire
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
        </form>
    
    </div>

    <?php
        if (isset($_SESSION['success_message'])) {
            echo '<p class="success-message">' . $_SESSION['success_message'] . '</p>';

            // Effacer le message de succès après l'avoir affiché
            unset($_SESSION['success_message']);
        }
        if (isset($_SESSION['error_message'])) {
            echo '<p class="alert alert-danger">' . $_SESSION['error_message'] . '</p>';

            // Effacer le message de succès après l'avoir affiché
            unset($_SESSION['error_message']);
        }
        ?>

</div>




<?php
    include ("../include/piedDePage.inc.php");
?>
