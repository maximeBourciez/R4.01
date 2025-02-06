// Tableau contenant les termes et leurs URIs associées
let tableau = [
    { terme: "art", uris: ["http://monsite1.fr", "http://monsite2.fr"] },
    { terme: "plaire", uris: ["http://monsite1.fr"] },
    { terme: "est", uris: ["http://monsite1.fr"] },
    { terme: "tromper", uris: ["http://monsite1.fr"] },
    { terme: "nous", uris: ["http://monsite2.fr"] },
    { terme: "avons", uris: ["http://monsite2.fr"] },
    { terme: "afin", uris: ["http://monsite2.fr"] },
    { terme: "pas", uris: ["http://monsite2.fr"] },
    { terme: "mourir", uris: ["http://monsite2.fr"] },
    { terme: "vérité", uris: ["http://monsite2.fr"] }
];

// Fonction pour rechercher les URIs correspondant à un terme
function rechercherTermes() {
    let termeSaisi = document.getElementById("terme").value.trim().toLowerCase();
    let resultat = document.getElementById("resultats");

    // Vider la zone des résultats avant d'afficher les nouveaux résultats
    resultat.innerHTML = "";

    // Recherche du terme dans le tableau
    let trouve = false;
    tableau.forEach(item => {
        if (item.terme.toLowerCase() === termeSaisi) {
            trouve = true;
            let urisHTML = item.uris.map(uri => `<a href="${uri}" target="_blank">${uri}</a>`).join("<br>");
            resultat.innerHTML = `Les URIs correspondant à "${termeSaisi}" sont : <br>${urisHTML}`;
        }
    });

    if (!trouve) {
        resultat.innerHTML = `Aucun résultat trouvé pour "${termeSaisi}".`;
    }
}