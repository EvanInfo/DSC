<?php include('../include/entete.inc.php');?>
<main>
    <div class="container custom-margin-top-3 ">
        <div class=" entete-page-color">
            <?php echo generationEntete("Les véhicules de pompier","") ?>
            <div class="row justify-content-center entete-page">
                <p class="text-center">Gestion des véhicules</p>
            </div>
        </div>
    <div class="row custom-margin-top-3 text-center custom-margin-top-3">
       
      <div class="col-md-4"> 
        <?php echo generationOptions('Gestion des engins','Gestion des types engin qui peuvent exister','gestionEngin.jpeg','vehicule.php');?>
      </div>
      <div class="col-md-4"> 
        <?php echo generationOptions('Gestion des Véhicules','Pour ajouter ou supprimer des véhicules des casernes.','gestionVehicule.jpeg','gestionVehicule.php'); ?>
      </div>
    </div>
  </div>
</main>
<?php include('../include/piedDePage.inc.php');?>