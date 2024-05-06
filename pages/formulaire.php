<?php
  include("../include/entete.inc.php");

  ini_set('display_errors', 0);
  error_reporting(E_ALL);


  $erreurs = array(); // Initialiser un tableau pour stocker les erreurs
  if (isset($_SESSION['login']) && $_SESSION['login'] == false ){
    header('Location: ../pages/connexion.php');}
    
    // Page permettant l'inscription d'un pompier
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
      <?php
        if (isset($_SESSION['success_message'])) {
          echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
          unset($_SESSION['success_message']);
      }
    
        if (isset($_SESSION['erreur'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['erreur'] . '</div>';
            // Une fois l'erreur affichée, effacer la variable de session pour ne pas l'afficher à nouveau
            unset($_SESSION['erreur']);
        }
      ?>
      <form method="post" id="formulaire" action="../script/inscriptionPompier.php">
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
                <input class="form-check-input" type="radio" name="sexe" id="sexeFeminin" value="féminin" onchange="validateSexe()" checked>
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
                <input class="form-check-input" type="radio" name="type_pompier" id="professionnel" value="professionnel" onchange="validateType(); basculerChampsEmployeur()" checked>
                <label class="form-check-label" for="professionnel">Professionnel</label>
            </div>
            <div class="form-check form-check-inline" required>
                <input class="form-check-input" type="radio" name="type_pompier" id="volontaire" value="volontaire" onchange="validateType(); basculerChampsEmployeur()">
                <label class="form-check-label" for="volontaire">Volontaire</label>
            </div>
        </div>
      </div>
      
      
      <div id="champs-employeur" style="display: none;"> <!-- Cette div enveloppe les champs d'employeur et est initialement cachée -->
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="nom_employeur">Nom de l'employeur</label>
                <input type="text" class="form-control" name="nom_employeur" id="nom_employeur" oninput="validateNameEmployeur('nom_employeur')" >
                <div class="invalid-feedback">
                  Vous devez fournir un nom valide.
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="prenom_employeur">Prénom de l'employeur</label>
                <input type="text" class="form-control" name="prenom_employeur" id="prenom_employeur" oninput="validateNameEmployeur('prenom_employeur')">
                <div class="invalid-feedback">
                  Vous devez fournir un prénom valide.
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="tel_employeur">Téléphone de l'employeur</label>
                <input type="tel" class="form-control" name="tel_employeur" id="tel_employeur" oninput="validateTelephoneEmployeur()" >
                
                <div class="invalid-feedback">
                  Vous devez fournir un telephone valide.
                </div>
            </div>
          </div>
      </div>




      <input type="submit" value="Valider" class="btn btn-primary" name="valider" id="boutton" />
  
    </form>  
  </div>

    
    <?php
      include ("../include/piedDePage.inc.php");
    ?>
 