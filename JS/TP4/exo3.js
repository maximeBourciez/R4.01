var tab = [1, 2, 3, 4, 5, 1, 2, 3, 4, 5];

function printTab(){
    let result = "";
    for (var i = 0; i < tab.length; i++) {
        result += tab[i] + " ";
    }
    document.getElementById("tabbase").innerHTML = result;
}

/********* 
 * Question de suppression des doublons 
 *********/
// Version itérative
function clearTab(){
    result = "";
    tabEltsuniques = [...new Set(tab)];

    for (var i = 0; i < tabEltsuniques.length; i++) {
        result += tabEltsuniques[i] + " ";
    }
    document.getElementById("resultat").innerHTML = result; 
}

// Version récursive
function zipVector(arr, index = 0, seen = new Set()) {
    // Cas de base : si le tableau est vide
    if (arr.length === 0) {
        return [];
    }
    
    // Cas de base : si on atteint la fin du tableau
    if (index >= arr.length) {
        return [];
    }
    
    // Si l'élément n'a pas encore été vu
    if (!seen.has(arr[index])) {
        seen.add(arr[index]);
        return [arr[index], ...zipVector(arr, index + 1, seen)];
    }
    
    // Si l'élément a déjà été vu, on le saute
    return zipVector(arr, index + 1, seen);
}


// Fonction pour compresser et afficher le résultat
function compressTab() {
    let resultatCompress = zipVector([...tab]);
    document.getElementById('compression').innerHTML = "Résultat de la compression : " + resultatCompress.join(', ');
}

// Exemples d'utilisation :
console.log(zipVector([1, 1, 2, 3, 3, 3, 4, 5, 5])); // [1, 2, 3, 4, 5]
console.log(zipVector([1, 2, 3])); // [1, 2, 3]
console.log(zipVector([1, 1, 1])); // [1]
console.log(zipVector([])); // []