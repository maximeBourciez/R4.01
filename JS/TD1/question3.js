function calculerSurface() {
    let largeur = prompt("Entrez la largeur du rectangle :");
    let longueur = prompt("Entrez la longueur du rectangle :");
    let surface = largeur * longueur;
    alert("La surface du rectangle est : " + surface);
}

function calculerPerimetre() {
    let largeur = prompt("Entrez la largeur du rectangle :");
    let longueur = prompt("Entrez la longueur du rectangle :");
    let perimetre = 2 * (parseFloat(largeur) + parseFloat(longueur));
    document.getElementById("resultat").innerText = "Le périmètre du rectangle est : " + perimetre;
}