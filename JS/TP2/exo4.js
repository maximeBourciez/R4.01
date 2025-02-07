let form = document.getElementById("calculForm");

form.addEventListener("submit", function (e) {
    e.preventDefault(); // Empêcher le rechargement de la page
    let inputs = document.querySelectorAll("input[name='resultat']");
    let labels = document.querySelectorAll("label.calcul");

    let nbCorrects = 0;
    for (let i = 0; i < inputs.length; i++) {
        // Récupérer la valeur de l'input et la convertir en nombre
        let userAnswer = parseInt(inputs[i].value);

        // Récupérer l'expression mathématique et calculer le résultat attendu
        let expression = labels[i].textContent.replace("=", "").trim();
        let resAttendu = eval(expression);

        // Vérifier si la réponse est correcte
        if (!isNaN(userAnswer) && userAnswer === resAttendu) {
            nbCorrects++;
            labels[i].style.color = "green"; // Mettre le label en vert
        } else {
            labels[i].style.color = "red"; // Mettre le label en rouge
        }
    }

    // Afficher le nombre de bonnes réponses
    alert("Vous avez " + nbCorrects + " bonnes réponses.");
});