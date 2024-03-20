<?php
include("../include/entete.inc.php");

ini_set('display_errors', 0);

$erreurs = array(); // Initialiser un tableau pour stocker les erreurs

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Récupération des données du formulaire
        $matricule = $_POST['matricule'];
        $date_naissance = $_POST['naissance'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $sexe = $_POST['sexe']; 
        $grade = $_POST['Grade'];
        $telephone = $_POST['tel'];
        $caserne = $_POST['Caserne'];
        $type_pompier = $_POST['type_pompier']; 

        // Insertion des données dans la table Pompier
        $pompier = new Pompier([
            'Matricule' => $matricule, 
            'DateNaiss' => $date_naissance, 
            'Nom' => $nom, 
            'Prenom' => $prenom, 
            'Sexe' => $sexe, 
            'id' => $grade, 
            'Tel' => $telephone, 
            'idCaserne' => $caserne
        ]);

        // Essayer de définir les valeurs
            $pompier->setMatricule($matricule);
            $pompier->setDateNaiss($date_naissance);
            $pompier->setNom($nom);
            $pompier->setPrenom($prenom);
            $pompier->setSexe($sexe);
            $pompier->setId($grade);
            $pompier->setTel($telephone);
            $pompier->setIdCaserne($caserne);


        // Si tout se passe bien, insérer dans la base de données
        $pompierManager->inserer($pompier);

        if ($type_pompier === 'volontaire'){
            $volontaire = new Volontaire(['Matricule' => $matricule]);
            $volontaireManager->inserer($volontaire);
        } else {
            $pro = new Professionnel(['Matricule' => $matricule]);
            $professionnelManager->inserer($pro);
        }
        
        header('Location: formulaire.php');
        exit(); // Assurez-vous de terminer le script après la redirection
    } catch (PDOException $e) {
        
        $erreurs[] = "Une erreur est survenue lors du traitement de votre demande. Veuillez réessayer plus tard.";
        //var_dump($e->getMessage());
    } catch (Exception $e) {
        // Attrapez toute autre exception non gérée ici
        $erreurs[] = "Une erreur est survenue: " . $e->getMessage();
        //var_dump($e->getMessage());
    }

    //var_dump($erreurs);
}
?> 

 
  <div class="container custom-margin-top-3">
    <?php echo generationEntete("Ajout Pompier") ?>
    <div class="jumbotron">
          <div class="row">
              <div class="col">
              <?php if (!empty($erreurs)): ?>
                    <?php foreach ($erreurs as $erreur): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $erreur; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                
              </div>
          </div>
    <form method="post" id="formulaire">
      <div class="form-group row">
        <div class="form-group col-md-6">
          <label for="matricule">Matricule</label>
          <input type="number" class="form-control" name="matricule" id="matricule" placeholder="Ex: 876524" oninput="validateMatricule()" required>
    
          <div class="invalid-feedback">
            Le champ matricule est obligatoire
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="date">Date de naissance</label>
          <input type="date" class="form-control" name="naissance" id="naissance" oninput="validateDate()" required>

          <div class="invalid-feedback">
            La date doit être correcte.
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="form-group col-md-6">
          <label for="nom">Nom</label>
          <input type="text" class="form-control" name="nom" id="nom" oninput="validateName('nom')" required>
          <div class="invalid-feedback">
          Le nom du pompier est obligatoire.
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="prenom">Prénom</label>
          <input type="text" class="form-control" name="prenom" id="prenom" oninput="validateName('prenom')" required>
          <div class="invalid-feedback">
            Le prénom du pompier est obligatoire.
          </div>
        </div>
      </div>


    <div class="form-group">
      <div class="row">
          <!-- Colonne des boutons radio Sexe -->
          <div class="col-md-6" >
              <label for="inputSexe">Sexe :</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="sexe" id="sexeFeminin" value="féminin" onchange="validateSexe()">
                <label class="form-check-label" for="sexeFeminin">Féminin</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="sexe" id="sexeMasculin" value="masculin" onchange="validateSexe()">
                <label class="form-check-label" for="sexeMasculin">Masculin</label>
              </div>
              <div class="invalid-feedback">
                Veuillez choisir un sexe.
              </div>
          </div>
          
          <!-- Colonne du sélecteur de grade -->
          <div class="col-md-6">
              <div class="form-group">
                  <label for="inputState">Grade</label>
                  <select id="Grade" class="form-control "  name="Grade" oninput="validateGrade()" required>
                      <option value="" disabled selected>Choisissez un grade</option>
                      <?php
                      $listeGrade = $gradeManager->getGrade();

                      // Générer le menu HTML
                      foreach ($listeGrade as $grade) {
                          echo '<option value="' . $grade['id'] . '">' . $grade['libellé'] . '</option>';
                      }
                      ?>
                  </select>
                </div>
              </div>
          </div>
      </div>


      <div class="form-group row">
        <div class="form-group col-md-6">
          <label for="tel">Téléphone</label>
          <input type="number" class="form-control " name="tel" id="tel" oninput="validateTelephone()"  required>
          <div class="invalid-feedback">
            Vous devez fournir un telephone valide.
          </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="inputState">Caserne</label>
                <select id="Caserne" class="form-control " name="Caserne" oninput="validateCaserne()" required>
                    <option value="" disabled selected>Choisissez une caserne</option>
                    <?php
                    $listeCaserne = $caserneManager->getCaserne();

                    // Générer le menu HTML
                    foreach ($listeCaserne as $caserne) {
                        echo '<option value="' . $caserne['id'] . '">' . $caserne['Nom'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
      </div>
      <!-- Choix entre Professionnel ou Volontaire -->
      <div class="form-group row">
        <!-- Colonne des boutons radio -->
        <div class="col-md-6">
        <label for="inputType">Type Pompier :</label>
            <div class="form-check form-check-inline" required>
                <input class="form-check-input" type="radio" name="type_pompier" id="professionnel" value="professionnel" onchange="validateType()">
                <label class="form-check-label" for="professionnel">Professionnel</label>
            </div>
            <div class="form-check form-check-inline" required>
                <input class="form-check-input" type="radio" name="type_pompier" id="volontaire" value="volontaire" onchange="validateType()">
                <label class="form-check-label" for="volontaire">Volontaire</label>
            </div>
        </div>
      </div>
      <input type="submit" value="Valider" class="btn btn-primary" name="valider" id="boutton" />
      
    </form>  
  </div>

    
    <?php
      include ("../include/piedDePage.inc.php");
    ?>
  </body>
  </html>