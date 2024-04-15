<?php include('../include/entete.inc.php');?>
<main>
    <div class="container custom-margin-top-3 ">
        <div class=" entete-page-color">
            <?php echo generationEntete("Les véhicules de pompier","") ?>
            <div class="row justify-content-center entete-page">
                <p class="text-center">Gestion des véhicules</p>
            </div>
        </div>
        <div class="row custom-margin-top-3 text-center">
            <div class="col-md-4"> 
                <?php 
                    echo generationOptions('Gestion des Véhicules','Pour ajouter des véhicules aux casernes.','gestionVehicule.jpeg','ajoutVehiculeCaserne.php');
                ?>
            </div>
            <div class="col-md-4"> 
                <?php 
                    echo generationOptions('Gestion des Véhicules','Pour supprimer des véhicules des casernes.','corbeille.jpg','suppressionVehiculeCaserne.php');
                ?>
            </div>
        </div>

  </div>
</main>
<?php include('../include/piedDePage.inc.php');?>