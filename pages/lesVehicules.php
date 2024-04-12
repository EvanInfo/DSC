<?php include('../include/entete.inc.php');?>
<main>
    <div class="container custom-margin-top-3 ">
        <div class=" entete-page-color">
            <?php echo generationEntete("Les véhicules de pompier","") ?>
            <div class="row justify-content-center entete-page">
                <p class="text-center">Gestion des véhicules</p>
            </div>
        </div>
    <div class="row row-cols-1 row-cols-md-3 mb-3  custom-margin-top-3 text-center">
      <?php 
        echo generationOptions('Gestion des engins','Gestion des types engin qui peuvent exister','gestionEngin.jpeg','vehicule.php');
        echo generationOptions('Gestion des Véhicules','Pour ajouter des véhicules aux casernes.','gestionVehicule.jpeg','gestionVehicule.php');
        echo generationOptions('Gestion des reparations','Entretiens et suivis des véhicules de la flotte.','entretienVehicule.jpeg');
      ?>
    </div>
  </div>
</main>
<?php include('../include/piedDePage.inc.php');?>