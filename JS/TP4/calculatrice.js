// Variable globale pour suivre si un calcul vient d'être effectué
let calculResultat = false;

function appendValue(value) {
    let resultField = document.getElementById("result");
    let currentValue = resultField.value.trim();
    
    // Conversion des opérateurs pour l'affichage
    const displayValue = value === '*' ? '×' : (value === '/' ? '÷' : value);
    
    // Vérifier si la saisie est un chiffre ou un opérateur valide
    if (!/^[0-9.×÷\-+*/]$/.test(value)) {
        return;
    }
    
    // Si un calcul vient d'être effectué
    if (calculResultat) {
        // On n'autorise que les opérateurs après un calcul
        if (/[×÷\-+*\/]/.test(value)) {
            resultField.value = currentValue + displayValue;
            calculResultat = false; // On réinitialise pour permettre la saisie normale après l'opérateur
        }
        return;
    }
    
    // Empêcher la saisie si le champ est vide et que c'est un opérateur (sauf le moins)
    if (currentValue === "" && /[×÷+*\/]/.test(value)) {
        return;
    }
    
    // Empêcher la répétition des opérateurs
    if (/[×÷\-+]$/.test(currentValue) && /[×÷\-+*\/]/.test(value)) {
        return;
    }
    
    // Empêcher plusieurs points dans un même nombre
    if (value === '.') {
        let numbers = currentValue.split(/[-+×÷]/);
        if (numbers[numbers.length - 1].includes('.')) {
            return;
        }
    }
    
    resultField.value = currentValue + displayValue;
}

function calculateResult() {
    let resultField = document.getElementById("result");
    let expression = resultField.value.trim();
    
    // Vérifier si l'expression est vide
    if (!expression) {
        return;
    }
    
    // Vérifier si l'expression se termine par un opérateur
    if (/[×÷\-+]$/.test(expression)) {
        alert("Expression invalide : l'expression ne peut pas se terminer par un opérateur");
        return;
    }
    
    // Vérifier si l'expression contient des caractères non autorisés
    if (/[^0-9.×÷\-+\s]/.test(expression)) {
        alert("Expression invalide : caractères non autorisés");
        return;
    }
    
    // Remplacer les symboles pour l'évaluation
    expression = expression.replace(/×/g, '*').replace(/÷/g, '/');
    
    try {
        const result = eval(expression);
        
        // Vérifier si le résultat est un nombre valide
        if (isNaN(result) || !isFinite(result)) {
            alert("Expression invalide : le résultat n'est pas un nombre valide");
            return;
        }
        
        resultField.value = result;
        calculResultat = true; // Marquer qu'un calcul vient d'être effectué
    } catch (e) {
        alert("Expression invalide : veuillez vérifier votre saisie");
    }
}

function clearResult() {
    document.getElementById("result").value = "";
    calculResultat = false; // Réinitialiser l'état du calcul
}