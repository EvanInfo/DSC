<?php
include("../include/entete.inc.php");
?>


<div class="container custom-margin-top-3 ">
    <div class=" entete-page-color">
      <?php echo generationEntete("Les véhicules de pompier","") ?>
      
      <div class="row justify-content-center entete-page">
        <p class="text-center">Voici la liste des types de véhicules que l'on peut trouver dans une caserne de pompier</p>
      </div>
    </div>
    <button type="button" class="btn btn-danger btn-top-right">Danger</button>

    <?php
      $vehicule = $enginManager->affichageEngin();
      //var_dump($vehicule);
      include('../script/affichage_vehicule.php');
    ?>

</div>

<?php
    include ("../include/piedDePage.inc.php");
  ?>