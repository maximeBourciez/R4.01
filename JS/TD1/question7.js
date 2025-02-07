function calculerExpression() {
    let expression = document.getElementById("expression").value;
    try {
        let resultat = eval(expression);
        document.getElementById("resultat").innerText = "Résultat : " + resultat;
    } catch (error) {
        alert("Expression invalide. Veuillez entrer une expression correcte.");
    }
}