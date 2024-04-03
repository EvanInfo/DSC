<div class="container">
    <div class="row">
        <?php foreach ($vehicule as $vehicules) : ?>
            <div class="col-md-4 mt-4">
                <div class="card-deck">
                    <div class="card bg-light border-dark">
                        <img class="card-img-top" src="<?php echo $vehicules['Url_Image']; ?>" alt="Photo"/>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $typeEnginManager->affichageTypeEngin($vehicules['Type_Engin_id']); ?></h5>
                            <a href="#" class="btn btn-primary">Je veux voir...</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

