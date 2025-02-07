// Question 1 - Choix de la couleur de fond
/*
window.onload = function(){
    let couleur = prompt("Saisissez une couleur de fond (gris,bleu,vert) :", "white");
    switch(couleur){
        case "gris":
            document.body.style.backgroundColor = "grey";
            break;
        case "bleu":
            document.body.style.backgroundColor = "blue";
            break;
        case "vert":
            document.body.style.backgroundColor = "green";
            break;
        default:
            document.body.style.backgroundColor = couleur;
            break;
    }
}*/

// Quesiton 2 - Liste de couleurs
window.onload = function () {
    let select = document.querySelector("select");

    select.addEventListener("change", function () {
        // Récupérer la couleur sélectionnée
        let couleur = select.value.toLowerCase();

        // Changer la couleur de fond du body
        document.body.style.backgroundColor = couleur;
    });
};