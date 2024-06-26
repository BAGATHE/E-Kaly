var terme = {
    "terme" : [
        {
            "text" : "Les clients potentiels qui veulent passez commande doivent s’inscrire ou se connecter"
        },
        {
            "text" : "Les clients ne peuvent pas annuler les commandes validées"
        },
        {
            "text" : "Le restaurant est obligé de soumettre leurs heures de disponibilités (ex : 09h00 - 21h00)"
        },
        {
            "text" : "Toutes les commandes reçues par le restaurant doivent être effectués durant son ouverture"
        },
        {
            "text" : "Le restaurant n’accepte plus les commandes 1h avant la fermeture du restaurant"
        },
        {
            "text" : "Le restaurant ne peut pas supprimer son compte sur la plateforme"
        },
        {
            "text" : "On attribue une commande à un livreur en fonction de sa disponibilité et proximité"
        },
        {
            "text" : "Paiement des livreurs basé sur les commandes effectuées"
        },
        {
            "text" : "Le livreur n’ayant pas accomplie les livraisons qu’il a accepté sera pénalisé à la fin de la journée"
        },
        {
            "text" : "Seul l’admin peut gérer les comptes des utilisateurs(clients,restaurants,livreurs)"
        }
    ]
}

document.addEventListener("DOMContentLoaded", function() {
    var ul = document.getElementsByClassName("about-list");
    console.log(ul);

    if (ul.length === 0) {
        console.log("Element not found");
    } else {
        for (var i = 0; i < terme.terme.length; i++) {
            var li = document.createElement("li");
            li.className = "about-item";
            
            var icon = document.createElement("ion-icon");
            icon.setAttribute("name", "checkmark-outline");
            li.appendChild(icon);
            
            var span = document.createElement("span");
            span.className = "span";
            span.textContent = terme.terme[i].text;
            li.appendChild(span);
            
            ul[0].append(li);
        }
    }
});