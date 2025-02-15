// Fonction pour vérifier si une adresse IP se termine par .192
function filtrerIP(ip) {
    return /\.192$/.test(ip);
}

// Fonction pour vérifier si un domaine se termine par .fr
function filtrerDomaine(domaine) {
    return /\.fr$/.test(domaine);
}

// Fonction pour générer 10 fenêtres positionnées aléatoirement avec une image de fond
function genererFenetres(x) {
    let index = 0;

    function ouvrirFenetre() {
        if (index < x) {
            let left = Math.floor(Math.random() * (window.screen.availWidth - 500));
            let top = Math.floor(Math.random() * (window.screen.availHeight - 500));

            let nouvelleFenetre = window.open("", "_blank", `width=500,height=500,left=${left},top=${top}`);

            if (nouvelleFenetre) {
                nouvelleFenetre.document.write(`
                <html>
                    <head>
                        <style>
                            body {
                                margin: 0;
                                padding: 0;
                                background: url('imageBG.jpg') no-repeat center center fixed;
                                background-size: cover;
                                width: 100vw;
                                height: 100vh;
                            }
                        </style>
                    </head>
                    <body>
                    </body>
                </html>
            `);
                nouvelleFenetre.document.close(); // Termine l'écriture du document
            } else {
                console.warn("Impossible d'ouvrir une fenêtre (pop-up bloqué ?).");
            }

            index++;
            setTimeout(ouvrirFenetre, 300); // Ouvre les fenêtres avec un léger délai
        }
    }

    ouvrirFenetre();
}


// Exemple d'utilisation
console.log(filtrerIP("192.168.1.192")); // true
console.log(filtrerIP("10.0.0.1")); // false

console.log(filtrerDomaine("exemple.fr")); // true
console.log(filtrerDomaine("exemple.com")); // false

// Générer les fenêtres
genererFenetres(2);