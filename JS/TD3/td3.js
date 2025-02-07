// Question 1 - Fonction max
function max(a, b){
    if (a > b){
        return a;
    } else {
        return b;
    }
}

// Question 2 - Fonction calculer qui vérifie le type des entrées
function calculer(a, b){
    if (!typeof a === "number" || !typeof b === "number") {
            return "Les deux arguments doivent être des nombres";
    } else {
        return max(a,b);
    }
}

// Question 3 - Focntion calculer a partir d'un formulaire f
function calculer2(){
    var a = document.getElementById("a").value;
    var b = document.getElementById("b").value;
    var res = calculer(a, b);
    alert(res);
}

// Question 4 - Appeler la fonction calculer2 lors du clic sur le bouton du formulaire
document.getElementById("f").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission
    calculer2();
});

// Question 5 - Fonction qui retourne le max de 4 nombres
function max4(a, b, c, d){
    return max(max(a,b), max(c,d));
}

// Question 6 - Fonction qui retourne le max de 8 nombres
function max8(a, b, c, d, e, f, g, h){
    return max(max4(a,b,c,d), max4(e,f,g,h));
}

// Question 7 - Fonction qui tire un aléatoire compris entre a et b
function aleatoire(a, b){
    return Math.floor(Math.random() * (b - a + 1)) + a;
}

// QUestion 8 - Focntion de résultat du jeu de devinette
function petitJeu(a){
    var nb = aleatoire(1, 10);
    if (a == nb){
        return "Bravo, vous avez trouvé le bon nombre";
    } else {
        return "Désolé, le bon nombre était " + nb;
    }
}

// Question 9 - Fonction de jeu de devinette avec indices
function autrePetitJeu(){
    var nb = aleatoire(1, 100);
    var a = prompt("Entrez un nombre entre 1 et 100");
    var i = 0;
    while (a != nb){
        if (a < nb){
            a = prompt("Le nombre est plus grand, essayez encore");
        } else {
            a = prompt("Le nombre est plus petit, essayez encore");
        }
        i++;
    }
    return "Bravo, vous avez trouvé le bon nombre en " + i + " essais";
}
