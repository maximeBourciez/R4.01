function calculerJours() {
    let mois = parseInt(prompt("Entrez le numéro du mois (1-12) :"));
    let annee = parseInt(prompt("Entrez l'année :"));
    
    if (isNaN(mois) || isNaN(annee) || mois < 1 || mois > 12) {
        alert("Veuillez entrer des valeurs valides.");
        return;
    }
    
    let jours = new Date(annee, mois, 0).getDate();
    alert("Le mois " + mois + " de l'année " + annee + " contient " + jours + " jours.");
}