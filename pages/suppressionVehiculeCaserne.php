<?php
include("../include/entete.inc.php");

if (isset($_SESSION['login']) && $_SESSION['login'] == false ){
    header('Location: ../pages/connexion.php');}
?>


<div class="container custom-margin-top-3 ">
    <div class=" entete-page-color">
      <?php echo generationEntete("Suppression d'un véhicule d'une caserne","") ?>
      
      <div class="row justify-content-center entete-page">
        <p class="text-center">Attention la suppression est définitive !!!</p>
      </div>
    </div>
    

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group text-center custom-margin-top-1">
                    <label for="inputState">Vehicule</label>
                    <select id="vehicule" class="form-control " name="vehicule"  required>
                        <option value="" disabled selected>Choisissez une affectation</option>
                        <?php
                        $listeAffectation = $enginManager->affichageEngin();

                        // Générer le menu HTML
                        foreach ($listeAffectation as $affectation) {
                            echo '<option value="' . $affectation['Numéro'] . '">' . $affectation['Type_Engin_id'] . '</option>';
                        }
                        ?>
                    </select>

                   
                </div>
            </div>
        </div>
    </div>

</div>
    <div class="text-center custom-margin-top-1">
    <form action="../script/suppression_Vehicule.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-danger">Suppression véhicule</button>
    </form>
    </div>
<?php
    include ("../include/piedDePage.inc.php");
?>
