function afficherTable() {
    let nombre = parseInt(document.getElementById("nombre").value);
    let resultat = "";
    
    if (isNaN(nombre)) {
        alert("Veuillez entrer un nombre valide.");
        return;
    }
    
    for (let i = 1; i <= 10; i++) {
        resultat += nombre + " x " + i + " = " + (nombre * i) + "<br>";
    }
    
    document.getElementById("resultat").innerHTML = resultat;
}