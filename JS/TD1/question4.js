function calculer() {
    let largeur = parseFloat(document.getElementById("largeur").value);
    let longueur = parseFloat(document.getElementById("longueur").value);

    if (isNaN(largeur) || isNaN(longueur)) {
        alert("Veuillez entrer des valeurs valides.");
        return;
    }

    let surface = largeur * longueur;
    let perimetre = 2 * (largeur + longueur);

    document.getElementById("resultat").innerHTML =
        "Surface : " + surface + "<br>" +
        "Périmètre : " + perimetre;
}