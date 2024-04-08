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
                                <a href="#" class="btn btn-secondary">Modifier</a>
                                <form action="Suppression_engin.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo ($vehicules['id']); ?>">
                                    <button type="submit" class="btn btn-secondary">Supprimer</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

