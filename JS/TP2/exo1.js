// Question 1 - Déclarer un tableau joursDeLaSemaine contenant les jours de la semaine
const joursDeLaSemaine = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];

// Question 2 - Afficher les jours de la semaine avec join
function afficherJoursDeLaSemaineJoin() {
    document.getElementById("jours1").innerText = "Les jours de la semaine : " + joursDeLaSemaine.join(" ; ");
}

// Question 3 - Afficher les jours de la semaine avec une boucle
function afficherJoursDeLaSemaine() {
    let resultat = "";
    for (let i = 0; i < joursDeLaSemaine.length; i++) {
        resultat += "Jour " + i + " : " + joursDeLaSemaine[i] + " ; " + "\n";
    }
    document.getElementById("jours2").innerText = resultat;
}


// Appel des fonctions au chargement de la page
const onLoadFunctions = [];

onLoadFunctions.push(afficherJoursDeLaSemaineJoin);
onLoadFunctions.push(afficherJoursDeLaSemaine);

window.onload = function() {
    onLoadFunctions.forEach(func => func());
};