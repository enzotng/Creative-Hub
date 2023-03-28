// exécute le code lorsque la page est entièrement chargée
window.onload = function () {
    // définit les valeurs x et y pour le graphique
    var xValues = ["SAE 302", "Darknet", "SAE 301", "SAE Leclerc"];
    var yValues = [55, 49, 44, 24];
    var barColors = [
        "#444492",
        "#3ba99c",
        "#69d1c5",
        "#7ebce6"
    ];

    // crée un graphique à secteurs avec les données spécifiées
    new Chart("myChart", {
        type: "doughnut",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: false, // pas de titre
                text: "Compétences"
            },
            legend: {
                display: true, // afficher la légende
                position: "left", // position de la légende sur la gauche
                labels: {
                    fontSize: 16,
                    fontColor: "#000000",
                    fontFamily: "Ubuntu", // police spécifique pour la légende
                }
            }
        }
    });
}

// définit les éléments de la page nécessaires pour la pagination
var items = $(".gridTravaux .travaux");
var numItems = items.length;
var perPage = 4;

items.slice(perPage).hide(); // masque tous les éléments au-delà de la page 1

// initialise la pagination avec les options spécifiées
$('#pagination-container').pagination({
    items: numItems,
    itemsOnPage: perPage,
    prevText: "&laquo;", // texte pour le bouton précédent
    nextText: "&raquo;", // texte pour le bouton suivant
    onPageClick: function (pageNumber) {
        // affiche les éléments pour la page actuelle et cache les autres
        var showFrom = perPage * (pageNumber - 1);
        var showTo = showFrom + perPage;
        items.hide().slice(showFrom, showTo).show();
    }
});
