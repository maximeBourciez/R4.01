var tab = [1, 2, 3, 4, 5, 1, 2, 3, 4, 5];

function printTab(){
    let result = "";
    for (var i = 0; i < tab.length; i++) {
        result += tab[i] + " ";
    }
    document.getElementById("tabbase").innerHTML = result;
}

function clearTab(){
    result = "";
    tabEltsuniques = [...new Set(tab)];

    for (var i = 0; i < tabEltsuniques.length; i++) {
        result += tabEltsuniques[i] + " ";
    }
    document.getElementById("resultat").innerHTML = result; 
}