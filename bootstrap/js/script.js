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
    } else {
        matriculeInput.classList.add("is-invalid");
        matriculeInput.classList.remove("is-valid");
    }
}

function validateDate() {
    // Récupérer la valeur de la date de naissance
    var dateInput = document.getElementById("naissance").value;
    
    // Créer un objet Date à partir de la valeur saisie
    var dateObject = new Date(dateInput);
    
    // Créer un objet Date pour la date actuelle
    var currentDate = new Date();
    
    // Récupérer l'élément du champ de saisie de la date de naissance
    var dateInputField = document.getElementById("naissance");

    // Vérifier si la date est valide, inférieure à la date actuelle et supérieure ou égale à 1900
    if (dateObject instanceof Date && !isNaN(dateObject) && dateObject < currentDate && dateObject.getFullYear() >= 1900) {
        // La date est valide, ajouter la classe is-valid et retirer la classe is-invalid
        dateInputField.classList.remove("is-invalid");
        dateInputField.classList.add("is-valid");
        return true;
    } else {
        // La date n'est pas valide, ajouter la classe is-invalid et retirer la classe is-valid
        dateInputField.classList.remove("is-valid");
        dateInputField.classList.add("is-invalid");
        return false;
    }
}

function validateName(inputId) {
    // Récupérer la valeur saisie dans le champ de saisie
    var name = document.getElementById(inputId).value;
    
    // Récupérer l'élément du champ de saisie
    var inputField = document.getElementById(inputId);

    // Vérifier si le nom ou le prénom ont au moins une lettre et au plus 25 caractères
    if (/^[a-zA-Z]{1,25}$/.test(name)) {
        // Le nom ou le prénom est valide, ajouter la classe is-valid et retirer la classe is-invalid
        inputField.classList.remove("is-invalid");
        inputField.classList.add("is-valid");
        return true; // Le nom ou le prénom est valide
    } else {
        // Le nom ou le prénom n'est pas valide, ajouter la classe is-invalid et retirer la classe is-valid
        inputField.classList.remove("is-valid");
        inputField.classList.add("is-invalid");
        return false; // Le nom ou le prénom n'est pas valide
    }
}




// Lier les fonctions du formulaire à l'événement oninput 
document.getElementById("matricule").addEventListener("input", validateMatricule);
document.getElementById("naissance").addEventListener("input", validateDate);
document.getElementById("nom").addEventListener("input", function() {
    validateName("nom");
});

document.getElementById("prenom").addEventListener("input", function() {
    validateName("prenom");
});


