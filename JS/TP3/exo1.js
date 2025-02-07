document.addEventListener("DOMContentLoaded", function () {
    var nbEssais = 0;
    const MAX_ESSAIS = 5;
    const form = document.querySelector("form");
    const btn_verif = document.getElementById("btn_verif");
    const btn_submit = document.querySelector("button[type='submit']");
    const categorySelect = document.getElementById("category");
    const verificationInput = document.getElementById("verification");

    // Génération du nombre aléatoire
    function getRandom() {
        var randomNumber = Math.floor(Math.random() * 10000);
        document.getElementById("randomNumber").textContent = randomNumber;
    }

    // Vérification des champs obligatoires
    function validateFields() {
        let isValid = true;
        document.querySelectorAll("input[required], textarea[required]").forEach(input => {
            if (!input.value.trim()) {
                input.style.border = "2px solid red";
                isValid = false;
            } else {
                input.style.border = "1px solid #ccc";
            }
        });
        return isValid;
    }

    // Vérification du format de l'email
    function validateEmail() {
        const emailInput = document.getElementById("email");
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(emailInput.value)) {
            emailInput.style.border = "2px solid red";
            return false;
        }
        emailInput.style.border = "1px solid #ccc";
        return true;
    }

    // Vérification du code aléatoire
    function verifierAleatoire() {
        var randomNumber = parseInt(document.getElementById("randomNumber").textContent);
        var verification = parseInt(verificationInput.value);
        var resultSpan = document.getElementById("resultSaisie");

        if (randomNumber === verification) {
            alert("Vérification réussie !");
        } else {
            nbEssais++;
            if (nbEssais < MAX_ESSAIS) {
                resultSpan.textContent = randomNumber < verification
                    ? "Le nombre aléatoire est inférieur à votre saisie !"
                    : "Le nombre aléatoire est supérieur à votre saisie !";
                getRandom(); // Régénérer un nouveau nombre
                verificationInput.focus();
            } else {
                alert("Vous avez dépassé le nombre d'essais autorisé !");
                btn_verif.disabled = true;
                btn_submit.disabled = true;
            }
        }
    }

    // Gestion de l'ajout d'une catégorie
    function handleCategoryChange() {
        if (categorySelect.value === "Other") {
            let newCategory = prompt("Veuillez entrer une nouvelle catégorie :");
            if (newCategory && /^[^\d].*/.test(newCategory.trim())) {
                let newOption = document.createElement("option");
                newOption.value = newCategory;
                newOption.textContent = newCategory;
                categorySelect.appendChild(newOption);
                categorySelect.value = newCategory;
            } else {
                alert("La catégorie ne doit pas commencer par un chiffre !");
                categorySelect.value = "Other";
            }
        }
    }

    // Validation complète du formulaire avant soumission
    function validateForm(event) {
        event.preventDefault();

        if (!validateFields() || !validateEmail()) {
            alert("Veuillez corriger les erreurs avant d'envoyer le formulaire.");
            return;
        }

        var name = document.getElementById("name").value;
        var confirmationMessage = `Merci ${name}, votre message a bien été envoyé !`;
        window.open("", "_blank").document.write("<h2>" + confirmationMessage + "</h2>");
    }

    // Événements
    categorySelect.addEventListener("change", handleCategoryChange);
    btn_verif.addEventListener("click", verifierAleatoire);
    form.addEventListener("submit", validateForm);

    // Initialisation
    getRandom();
});