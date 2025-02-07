// Question 1 - Variables globales
var a = 3;
var b = 2;

// Question 2 - Fonction qui multiplie
function multiplier(y, x = 8) {
    return x * y;
}

// Question 3 - Fonction qui affiche
function afficher() {
    // Multiplication de a et b
    alert("Le résultat de la multiplication de " + a + " par " + b + " est " + multiplier(a, b));

    // Multiplication avec la valeur par défaut
    alert("Le résultat de la multiplication de " + a + " par 8 est " + multiplier(a));
}

// Question 4 - Tableaux
var tab = [-2, 1, 4];

// Question 5 - Fonction qui mulitiplie un nombre par tout le tableau 
function multiplier2(x) {
    for (var i = 0; i < tab.length; i++) {
        alert("Le résultat de la multiplication de " + x + " par " + tab[i] + " est " + multiplier(tab[i], x));
    }
}

// Question 6 - Fonction qui affiche le tableau
function afficher2() {
    // Récupérer la longueur du tableau
    var longueur = tab.length;

    // Effectuer les multiplication
    for (let i = 0; i < longueur - 1; i++) {
        alert(multiplier(tab[i], tab[i + 1]));
    }
}

// Fonction de tri
function trier(tab) {
    // Tri du tableau
    tab.sort();
    alert(tab);
}