<?php
include("../include/entete.inc.php");
if (isset($_SESSION['login']) && $_SESSION['login'] == false ){
    header('Location: ../pages/connexion.php');}
?>


<div class="container custom-margin-top-3 ">
    <div class=" entete-page-color">
      <?php echo generationEntete("Les véhicules de pompier","") ?>
      
      <div class="row justify-content-center entete-page">
        <p class="text-center">Voici la liste des types de véhicules que l'on peut trouver dans une caserne de pompier</p>
      </div>
    </div>
    <div class="text-center">
      <button type="button" class="btn btn-danger" onclick="window.location.href='Ajout_Vehicule.php'">Ajouter véhicules</button>
    </div>
    <?php
            if (isset($_SESSION['error_message'])) {
                echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_message'] . '</div>';
                // Une fois affiché, vous pouvez supprimer le message de la session pour qu'il ne s'affiche plus après un rechargement de la page
                unset($_SESSION['error_message']);
            }

            if (isset($_SESSION['success_message'])) {
                echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
                // Une fois affiché, vous pouvez supprimer le message de la session pour qu'il ne s'affiche plus après un rechargement de la page
                unset($_SESSION['success_message']);
            }?>
    <?php
      $vehicule =  $typeEnginManager->affichageTypeEngin();
     
    ?>
    <div class="container">
      <div class="row">
          
          <?php foreach ($vehicule as $vehicules) : ?>
              <div class="col-md-4 mt-4">
                  <div class="card-deck">
                      <div class="card bg-light border-dark">
                          <img class="card-img-top" src="<?php echo $vehicules['Url_Image']; ?>" alt="Photo"/>
                          <div class="card-body">
                              <h5 class="card-title"><?php echo $vehicules['Libellé']; ?></h5>
                              <div class="row">
                                  <form action="modification_Engin.php" method="post">
                                      <input type="hidden" name="id" value="<?php echo ($vehicules['id']); ?>">
                                      <button type="submit" class="btn btn-secondary">Modifier</button>
                                  </form>
                                  <form action="suppression_Engin.php" method="post">
                                      <input type="hidden" name="id" value="<?php echo ($vehicules['id']); ?>">
                                      <button type="submit" class="btn btn-secondary">Supprimer</button>
                                  </form>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
          <?php endforeach;?>
      </div>
    </div>


  

</div>

<?php
    include ("../include/piedDePage.inc.php");
?>
