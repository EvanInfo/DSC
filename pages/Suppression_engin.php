<?php
include("../include/entete.inc.php");
?>


<div class="container custom-margin-top-3 ">
    <div class=" entete-page-color">
      <?php echo generationEntete("Suppression d'un type Engin","") ?>
      
      <div class="row justify-content-center entete-page">
        <p class="text-center">Attention la suppression est définitive !!!</p>
      </div>
    </div>
    

    <?php
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $vehicule =  $typeEnginManager->affichageTypeEnginId($id);
    }else{
        header("Location: ../pages/vehicule.php");
        exit();
    }
     
      //var_dump($vehicule);
      include('../script/affichage_vehicule_unique.php');
    ?>
    

</div>
    <div class="text-center custom-margin-top-1">
    <form action="../script/suppression_vehicule.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-danger">Suppression véhicule</button>
    </form>
    </div>
<?php
    include ("../include/piedDePage.inc.php");
?>