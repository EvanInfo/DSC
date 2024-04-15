// script.js

function updateSelectedCategories(selectElement) {
    var selectedCategoriesDiv = document.getElementById("selectedCategories");
    selectedCategoriesDiv.innerHTML = ""; // Effacez le contenu précédent

    for (var i = 0; i < selectElement.selectedOptions.length; i++) {
        var selectedOption = selectElement.selectedOptions[i];
        selectedCategoriesDiv.innerHTML += '<span class="selectedCategory">' + selectedOption.text + '</span>';
    }
}

document.getElementById('uploadForm').addEventListener('submit', function (event) {
    event.preventDefault();

    // Reste du code pour envoyer la requête AJAX vers votre script PHP
});

function validateMatricule() {
    var matriculeInput = document.getElementById("matricule");
    var matriculeValue = matriculeInput.value.trim();
    
    if (/^\d{6}$/.test(matriculeValue)) {
        matriculeInput.classList.remove("is-invalid");
        matriculeInput.classList.add("is-valid");
        return true;
    } else {
        matriculeInput.classList.add("is-invalid");
        matriculeInput.classList.remove("is-valid");
        return false;
    }
}

function validateDate() {
    var dateInput = document.getElementById("naissance").value;
    var dateObject = new Date(dateInput);
    var currentDate = new Date();
    var dateInputField = document.getElementById("naissance");

    if (dateObject instanceof Date && !isNaN(dateObject) && dateObject < currentDate && dateObject.getFullYear() >= 1900) {
        dateInputField.classList.remove("is-invalid");
        dateInputField.classList.add("is-valid");
        return true;
    } else {
        dateInputField.classList.remove("is-valid");
        dateInputField.classList.add("is-invalid");
        return false;
    }
}

function validateName(inputId) {
    var name = document.getElementById(inputId).value;
    var inputField = document.getElementById(inputId);

    if (/^[a-zA-Z]{1,25}$/.test(name)) {
        inputField.classList.remove("is-invalid");
        inputField.classList.add("is-valid");
        return true;
    } else {
        inputField.classList.remove("is-valid");
        inputField.classList.add("is-invalid");
        return false;
    }
}


function validateNameEmployeur(inputId) {
    var name = document.getElementById(inputId).value;
    var inputField = document.getElementById(inputId);

    if (/^[a-zA-Z]{1,25}$/.test(name)) {
        inputField.classList.remove("is-invalid");
        inputField.classList.add("is-valid");
        return true;
    } else {
        inputField.classList.remove("is-valid");
        inputField.classList.add("is-invalid");
        return false;
    }
}


function validateSexe() {
    var sexeFeminin = document.getElementById("sexeFeminin");
    var sexeMasculin = document.getElementById("sexeMasculin");
    var inputFeminin = document.getElementById("sexeFeminin");
    var inputMasculin = document.getElementById("sexeMasculin");

    if (sexeFeminin.checked) {
        inputFeminin.classList.remove("is-invalid");
        inputFeminin.classList.add("is-valid");
        inputMasculin.classList.remove("is-valid");
        inputMasculin.classList.remove("is-invalid");
        return true;
    } else if (sexeMasculin.checked) {
        inputMasculin.classList.remove("is-invalid");
        inputMasculin.classList.add("is-valid");
        inputFeminin.classList.remove("is-valid");
        inputFeminin.classList.remove("is-invalid");
        return true;
    } else {
        inputFeminin.classList.remove("is-valid");
        inputFeminin.classList.add("is-invalid");
        inputMasculin.classList.remove("is-valid");
        inputMasculin.classList.add("is-invalid");
        return false;
    }
}

function validateGrade(){
    var gradeElement = document.getElementById("Grade");
    var selectedGrade = gradeElement.value;

    if (selectedGrade !== "") {
        gradeElement.classList.remove("is-invalid");
        gradeElement.classList.add("is-valid");
        return true;
    } else {
        gradeElement.classList.remove("is-valid");
        gradeElement.classList.add("is-invalid");
        return false;
    }
}

function validateTelephone() {
    var telephoneInput = document.getElementById("tel");
    var telephoneValue = telephoneInput.value.trim();
    
    if (/^\d{10}$/.test(telephoneValue)) {
        telephoneInput.classList.remove("is-invalid");
        telephoneInput.classList.add("is-valid");
        return true;
    } else {
        telephoneInput.classList.add("is-invalid");
        telephoneInput.classList.remove("is-valid");
        return false;
    }
}

function validateTelephoneEmployeur() {
    var telephoneInput = document.getElementById("tel_employeur");
    var telephoneValue = telephoneInput.value.trim();
    
    if (/^\d{10}$/.test(telephoneValue)) {
        telephoneInput.classList.remove("is-invalid");
        telephoneInput.classList.add("is-valid");
        return true;
    } else {
        telephoneInput.classList.add("is-invalid");
        telephoneInput.classList.remove("is-valid");
        return false;
    }
}

function validateCaserne(){
    var CaserneElement = document.getElementById("Caserne");
    var selectedCaserne = CaserneElement.value;

    if (selectedCaserne!== "") {
        CaserneElement.classList.remove("is-invalid");
        CaserneElement.classList.add("is-valid");
        return true;
    } else {
        CaserneElement.classList.remove("is-valid");
        CaserneElement.classList.add("is-invalid");
        return false;
    }
}

function validateType() {
    var professionnel = document.getElementById("professionnel");
    var volontaire = document.getElementById("volontaire");
    var inputProfessionnel = document.getElementById("professionnel");
    var inputVolontaire = document.getElementById("volontaire");

    if (professionnel.checked) {
        inputProfessionnel.classList.remove("is-invalid");
        inputProfessionnel.classList.add("is-valid");
        inputVolontaire.classList.remove("is-valid");
        inputVolontaire.classList.remove("is-invalid");
        return true;
    } else if (volontaire.checked) {
        inputVolontaire.classList.remove("is-invalid");
        inputVolontaire.classList.add("is-valid");
        inputProfessionnel.classList.remove("is-valid");
        inputProfessionnel.classList.remove("is-invalid");
        return true;
    } else {
        inputProfessionnel.classList.remove("is-valid");
        inputProfessionnel.classList.add("is-invalid");
        inputVolontaire.classList.remove("is-valid");
        inputVolontaire.classList.add("is-invalid");
        return false;
    }
}



// Lier les fonctions du formulaire à l'événement oninput 
document.getElementById("matricule").addEventListener("input", validateMatricule);
document.getElementById("naissance").addEventListener("input", validateDate);
document.getElementById("sexeFeminin").addEventListener("change", validateSexe);
document.getElementById("sexeMasculin").addEventListener("change", validateSexe);
document.getElementById("nom").addEventListener("input", validateName);
document.getElementById("prenom").addEventListener("input",  validateName);
document.getElementById("Grade").addEventListener("change",  validateGrade);
document.getElementById("tel").addEventListener("input", validateTelephone);
document.getElementById("Caserne").addEventListener("change",  validateCaserne);
document.getElementById("professionnel").addEventListener("change", validateType);
document.getElementById("volontaire").addEventListener("change", validateType);
document.getElementById("tel_employeur").addEventListener("input", validateTelephoneEmployeur);
document.getElementById("nom_employeur").addEventListener("input", validateNameEmployeur);
document.getElementById("prenom_employeur").addEventListener("input", validateNameEmployeur);


// Fonction pour afficher/cacher les champs d'employeur en fonction de la sélection de l'utilisateur
function basculerChampsEmployeur() {
    var typePompier = document.querySelector('input[name="type_pompier"]:checked').value;
    var champsEmployeur = document.getElementById('champs-employeur');

    // Si l'utilisateur sélectionne "Volontaire", afficher les champs d'employeur, sinon les cacher
    if (typePompier === 'volontaire') {
        champsEmployeur.style.display = 'block';
    } else {
        champsEmployeur.style.display = 'none';
    }
}

// Ajoutez un gestionnaire d'événements pour détecter les changements de sélection
var typePompierInputs = document.querySelectorAll('input[name="type_pompier"]');
typePompierInputs.forEach(function(input) {
    input.addEventListener('change', basculerChampsEmployeur);
});

// Assurez-vous d'appeler la fonction initiale pour configurer l'état initial des champs
basculerChampsEmployeur();

function afficherImageEnTempsReel() {
    document.getElementById('photo').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const image = new Image();
            image.src = e.target.result;
            image.classList.add("img-fluid");
            document.getElementById('imageContainer').innerHTML = '';
            document.getElementById('imageContainer').appendChild(image);
        }

        reader.readAsDataURL(file);
    });
}

// Appel de la fonction au chargement du document
document.addEventListener("DOMContentLoaded", function() {
    afficherImageEnTempsReel();
});

function afficherImage() {
    const inputPhoto = document.getElementById('photo');
    const imageApercu = document.getElementById('apercuImage');
  
    if (inputPhoto.files && inputPhoto.files[0]) {
      const lecteur = new FileReader();
  
      lecteur.onload = function (e) {
        imageApercu.src = e.target.result;
      };
  
      lecteur.readAsDataURL(inputPhoto.files[0]);
    } else {
      // Gérer les cas où aucun fichier n'est sélectionné (facultatif)
      imageApercu.src = ""; // Ou un chemin d'image par défaut
    }
  }
  
  // Appel de la fonction à chaque changement de l'input "photo"
  document.getElementById('photo').addEventListener('change', afficherImage);

// Fonction pour filtrer le journal en temps réel
function filterTable() {
    var input, filter, table, tr, tdDateTime, tdMessage, i, txtValueDateTime, txtValueMessage;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("journalBody");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        tdDateTime = tr[i].getElementsByTagName("td")[0]; // Index 0 correspond à la colonne des dates et heures combinées
        tdMessage = tr[i].getElementsByTagName("td")[1]; // Index 1 correspond à la colonne des messages
        if (tdDateTime && tdMessage) {
            txtValueDateTime = tdDateTime.textContent || tdDateTime.innerText;
            txtValueMessage = tdMessage.textContent || tdMessage.innerText;
            if (txtValueDateTime.toUpperCase().indexOf(filter) > -1 || txtValueMessage.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

// Fonction de vérification des mots de passe pour l'inscription
function vérificationMotDePasse() {
    var password1 = document.getElementById('motDePasse1').value;
    var password2 = document.getElementById('motDePasse2').value;

    if (password1.trim() === '' || password2.trim() === '') {
        // Au moins un des champs de mot de passe est vide
        document.getElementById('motDePasse1').classList.remove('is-valid');
        document.getElementById('motDePasse2').classList.remove('is-valid');
        document.getElementById('motDePasse1').classList.remove('is-invalid');
        document.getElementById('motDePasse2').classList.remove('is-invalid');
        document.getElementById('motDePasse1').nextElementSibling.style.display = 'none'; // Masque le message d'erreur
    } else if (password1 !== password2) {
        // Les mots de passe ne correspondent pas
        document.getElementById('motDePasse1').classList.remove('is-valid');
        document.getElementById('motDePasse2').classList.remove('is-valid');
        document.getElementById('motDePasse1').classList.add('is-invalid');
        document.getElementById('motDePasse2').classList.add('is-invalid');
        document.getElementById('motDePasse1').nextElementSibling.style.display = 'block'; // Affiche le message d'erreur
    } else {
        // Les mots de passe correspondent
        document.getElementById('motDePasse1').classList.remove('is-invalid');
        document.getElementById('motDePasse2').classList.remove('is-invalid');
        document.getElementById('motDePasse1').classList.add('is-valid');
        document.getElementById('motDePasse2').classList.add('is-valid');
        document.getElementById('motDePasse1').nextElementSibling.style.display = 'none'; // Masque le message d'erreur
    }
}

document.getElementById('motDePasse1').addEventListener('input', vérificationMotDePasse);
document.getElementById('motDePasse2').addEventListener('input', vérificationMotDePasse);

// Fonction de vérification de l'email pour l'inscription
function validerEmail(idInput) {
    var email = document.getElementById(idInput).value;
    var champInput = document.getElementById(idInput);

    // Expression régulière pour valider l'e-mail
    var regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (regexEmail.test(email)) {
        champInput.classList.remove("is-invalid");
        champInput.classList.add("is-valid");
        return true;
    } else {
        champInput.classList.remove("is-valid");
        champInput.classList.add("is-invalid");
        return false;
    }
}
document.getElementById('email').addEventListener('input', vérificationMotDePasse);

// Fonction pour changer l'image lors de la sélection d'une option dans gestion des véhicules
function changerImage() {
    var selectElement = document.getElementById('vehicule');
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var cheminImage = selectedOption.getAttribute('cheminImage');
    document.getElementById('apercuImage').src = cheminImage;
}
document.getElementById('vehicule').addEventListener('change', changerImage);
