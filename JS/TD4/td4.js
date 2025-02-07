// Question 1 - Fonction ouvrirFenetre & bougerFenetre
function ouvrirFenetre(){
    window.open("https://www.google.com", "Google", "width=600, height=400");
}

function bougerFenetre(){
    window.moveBy(100, 100);
}

// Question 2 - Fonction genererBouton
function genererBouton(){
    var nombre = document.querySelector("input[name='nombre']").value;
    var form = document.querySelector("form");
    for (var i = 0; i < nombre; i++){
        var button = document.createElement("button");
        button.innerHTML = "Bouton " + i;
        form.appendChild(button);
    }
}

// Question 3 - Fonction remplir
function remplir(){
    var valeur = document.querySelector("input[name='valeur']").value;
    var select = document.getElementById("maliste");
    var option = document.createElement("option");
    option.text = valeur;
    select.add(option);
}

// QUesiton 4 - Fonction marquer
function marquer(x){
    var select = document.getElementById("maliste");
    for (var i = 0; i < select.length; i++){
        if (select.options[i].text == x){
            select.options[i].style.color = "red";
        }
    }
}

// Question 5 - Fonction liste2tab
function liste2tab(x){
    var tab = [];
    for (var i = 0; i < x.length; i++){
        tab.push(x.options[i].text);
    }
    return tab;
}

// Question 6 - Focntion d'inversion de vecteur
function inverser(tab){
    var tab2 = [];
    for (var i = tab.length - 1; i >= 0; i--){
        tab2.push(tab[i]);
    }
    return tab2;
}

// Question 7 - Focntion append
function append(tab1, tab2){
    for (var i = 0; i < tab2.length; i++){
        tab1.push(tab2[i]);
    }
    return tab1;
}

// Question 8 - Tri fusion
function fusion(L, M) {
    var N = [];
    var i = 0;
    var j = 0;

    while (i < L.length && j < M.length) {
        if (L[i] <= M[j]) {
            N.push(L[i]);
            i++;
        } else {
            N.push(M[j]);
            j++;
        }
    }

    while (i < L.length) {
        N.push(L[i]);
        i++;
    }

    while (j < M.length) {
        N.push(M[j]);
        j++;
    }

    return N;
}
