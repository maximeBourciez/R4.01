// Question 1 - Afficher nom du navigateur
function afficherNavigateur(){
    document.getElementById("navigateur").innerText = "Nom du navigateur : " + navigator.appName;
}

// Question 2 - Afficher le titre du document
function afficherTitreDocument(){
    document.getElementById("titre").innerText = "Titre du document : " + document.title;
}

// Question 3 - Afficher la dernière date de modification
function afficherDateModif(){
    document.getElementById("dateModif").innerText = "Dernière date de modification : " + document.lastModified;
}