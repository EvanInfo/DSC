<?php
include ("../include/entete.inc.php");

/*if (isset($_POST['valider']))
{
 
    $nom = htmlspecialchars($_POST['nom'], ENT_QUOTES, 'UTF-8');
    $prenom = htmlspecialchars($_POST['prenom'], ENT_QUOTES, 'UTF-8');
    $mail = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);

    $type = ($_POST['choixType'] === 'client') ? 'client' : 'Photographe';
    $motdepasse = ($_POST['motdepasse1']);

    
    $user = new User(['Nom' => $nom, 'Prenom' => $prenom, 'Mail' => $mail, 'Mdp' => $motdepasse, 'Type' => $type]);
    $manager->add($user);
    header('Location: inscriptionOK.php');
}
*/
?>
 
	<div class="container">
    <?php echo generationEntete("Ajout Pompier") ?>
    <div class="jumbotron">
    <form method="post">
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
          <div class="col-md-6" id="sexeFormGroup">
              <label for="inputState">Sexe :</label>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="sexef" value="féminin" onchange="validateSexe()">
                  <label class="form-check-label" for="sexef">Féminin</label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="sexem" value="masculin" onchange="validateSexe()">
                  <label class="form-check-label" for="sexem">Masculin</label>
              </div>
              <div class="invalid-feedback">
                  Veuillez choisir un sexe.
              </div>
          </div>
          
          <!-- Colonne du sélecteur de grade -->
          <div class="col-md-6">
              <div class="form-group">
                  <label for="inputState">Grade</label>
                  <select id="inputState" class="form-control is-invalid" required>
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
          <input type="tel" class="form-control is-invalid" name="tel" id="tel"  required>
          <small id="tel" class="form-text text-muted"></small>
          <div class="invalid-feedback">
            Vous devez fournir un telephone valide.
          </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="inputState">Caserne</label>
                <select id="inputState" class="form-control is-invalid" required>
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
        <label for="inputState">Type Pompier :</label>
            <div class="form-check form-check-inline" required>
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="professionnel" value="professionnel">
                <label class="form-check-label" for="professionnel">Professionnel</label>
            </div>
            <div class="form-check form-check-inline" required>
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="volontaire" value="volontaire">
                <label class="form-check-label" for="volontaire">Volontaire</label>
            </div>
        </div>
      </div>
      <input type="submit" value="Valider" class="btn btn-primary" name="valider" />
    </form>
  </div>

  
  <?php
    include ("../include/piedDePage.inc.php");
  ?>
</body>
</html>