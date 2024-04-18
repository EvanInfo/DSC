<?php
include("../include/entete.inc.php");
?>
<?php
if (isset($_SESSION['login']) && $_SESSION['login'] == true ) {
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Pompier</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Matricule</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Date Naissance</th>
                        <th>Téléphone</th>
                        <th>Sexe</th>
                        <th>Grade</th>
                        <th>Caserne</th>
                    </tr>
                </thead>
                <tbody id="pompierTableau">
                    <?php
                    $tableauPompier=$pompierManager->getPompier();
                    foreach ($tableauPompier as $pompier) {
                        echo "<tr>";
                        echo "<td>" . $pompier['Matricule'] . "</td>";
                        echo "<td>" . $pompier['Nom'] . "</td>";
                        echo "<td>" . $pompier['Prénom'] . "</td>";
                        echo "<td>" . $pompier['DateNaiss'] . "</td>";
                        echo "<td>" . $pompier['Tel'] . "</td>";
                        echo "<td>" . $pompier['Sexe'] . "</td>";
                        echo "<td>" . $gradeManager->getGradeId($pompier['id']) . "</td>";
                        echo "<td>" . $caserneManager->getCaserneId($affactationManager->getAffectationRecente($pompier['Matricule'])) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
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
                }
            ?>
    </div>


    <?php
} else {
    header('Location: ../pages/accueil.php');
}
?>
<?php
      include ("../include/piedDePage.inc.php");
?>

