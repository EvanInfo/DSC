<?php
include("../include/entete.inc.php");
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<div class="container mt-5">
    <h1>Journal d'activité</h1>
    <form class="form-inline mb-3">
        <input class="form-control mr-sm-2" type="search" placeholder="Rechercher..." aria-label="Search" id="searchInput" oninput="filterTable()">

    </form>
    <div class="table-responsive scrollable-table">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date et heure</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody id="journalBody">
                <?php
                $log_file = '../log/Journal.log';
                $log_content = file_get_contents($log_file);

                if ($log_content === false) {
                    echo "<tr><td colspan='2'>Erreur : Impossible de lire le fichier journal.</td></tr>";
                } else {
                    // Diviser le contenu du journal en lignes et les afficher dans la table
                    $lines = explode("\n", $log_content);
                    foreach ($lines as $line) {
                        $parts = explode("]", $line, 2);
                        $date_time = trim($parts[0], "[]");
                        $message = isset($parts[1]) ? trim($parts[1]) : '';
                        echo "<tr><td>$date_time</td><td>$message</td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
      include ("../include/piedDePage.inc.php");
?>

