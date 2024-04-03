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
