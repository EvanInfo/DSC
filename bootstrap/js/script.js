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


// Lier cette fonction à l'événement oninput du champ matricule
document.getElementById("matricule").addEventListener("input", validateMatricule);


