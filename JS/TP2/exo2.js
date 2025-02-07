// Question 1 - Fonction récursive
function somRec(i){
    if(i === 0){
        return 0;
    }
    return i + somRec(i - 1);
}

// Question 2 - Somme via la boucle for
function SomFor(i){
    somme = 0;
    for(let n = 0; n < i; n++){
        somme += n;
    }
}