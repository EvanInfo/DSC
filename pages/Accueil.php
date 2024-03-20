<?php
include("../include/entete.inc.php");
?>
<div class="container custom-margin-top-3"> 
    
    <div class ="entête">
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
    
    <div class="presentation-text">
        <p>Bienvenue sur notre application dédiée à la gestion de l'agenda et des ressources des pompiers. Notre application vise à simplifier et à optimiser la planification des interventions et des équipes de secours. Avec notre outil convivial, vous pouvez facilement enregistrer les emplois du temps des pompiers, planifier leurs rotations et organiser les missions de manière efficace.
        En plus de la gestion des agendas, notre application offre également la possibilité d'enregistrer les informations des véhicules d'urgence utilisés par les équipes de pompiers. Que ce soit des camions de pompiers, des ambulances ou d'autres véhicules spécialisés, vous pouvez stocker leurs détails, leurs disponibilités et leurs maintenances dans notre système centralisé.</p>
        <div class="position-absolute ">
            <img src="../Image/optimus.png" class=" rounded float-right image-petite" alt="">
        </div>
    </div>


    
</div>

<?php
      include ("../include/piedDePage.inc.php");
?>

</body>

</html>