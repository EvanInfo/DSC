<?php
include("../include/entete.inc.php");
?>

<div class="container custom-margin-top-3 ">
    <div class=" entete-page-color">
      <?php echo generationEntete("Ajout d'un type Engin","") ?>
      
      <div class="row justify-content-center entete-page">
        <p class="text-center">Formulaire pour ajouter un type d'engin</p>
      </div>
    </div>
    <h2 class="custom-margin-top-1">Ajout d'un type d'engin</h2>

    <form id="" action="" method="post" enctype="multipart/form-data" onsubmit="" novalidate>
        <div class="form-group row">
            <div class="form-group col-md-6">
            <label for="idTypeEngin">idTypeEngin</label>
            <input type="text" class="champCaserne form-control typeEngin" name="idTypeEngin" id="idTypeEngin" placeholder="Ex: EPA"  required>
        
            <div class="invalid-feedback">
                Le champ idTypeEngin est obligatoire
            </div>
            
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" accept="image/*" class="photo">
    </form>
   
   
</div>


<?php
    include ("../include/piedDePage.inc.php");
?>