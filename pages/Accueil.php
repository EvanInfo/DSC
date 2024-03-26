<?php
include("../include/entete.inc.php");
?>
<div class="container custom-margin-top-3"> 
    
    <div class ="entête custom-margin-top-3">
        <?php echo generationEntete("Accueil Pompier") ?>
    </div>
    <div id="carouselExampleFade" class="carousel slide carousel-fade w-75 mx-auto" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100 mx-auto" src="../Image/Caserne.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100 mx-auto" src="../Image/Caserne1.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100 mx-auto" src="../Image/Caserne2.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    
    <div class="presentation-text text-center">
        <p>Bienvenue sur notre application dédiée à la gestion de l'agenda et des ressources des pompiers</p>
        <!--<div class="position-absolute ">
            <img src="../Image/optimus.png" class=" rounded float-right image-petite" alt="">
        </div>-->
    </div>


    
</div>

<?php
      include ("../include/piedDePage.inc.php");
?>

</body>

</html>