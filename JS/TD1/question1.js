function saisirDimensions() {
    let largeur = prompt("Entrez la largeur du rectangle :");
    let longueur = prompt("Entrez la longueur du rectangle :");
    document.getElementById("resultat").textContent = "Largeur : " + largeur + "\nLongueur : " + longueur;
}