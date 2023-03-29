// exécute le code lorsque la page est entièrement chargée
window.onload = function () {
    // sélectionne le bouton "Modifier le projet"
    var modifierProjetBtn = document.getElementById("btnModifierProjet");

    // sélectionne la popup et le bouton "Annuler"
    var popup = document.querySelector(".popup-wrapper");
    var cancelBtn = document.querySelector("#cancelBtn");

    // ajoute un écouteur d'événement pour le clic sur le bouton "Modifier le projet"
    modifierProjetBtn.addEventListener("click", function () {
        // affiche la popup
        popup.style.display = "block";
    });

    // ajoute un écouteur d'événement pour le clic sur le bouton "Annuler"
    cancelBtn.addEventListener("click", function () {
        // cache la popup
        popup.style.display = "none";
    });

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

    // récupère les données à partir de la route /projets/domaine
    $.ajax({
        url: '/projets/domaine',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            // récupère les données de la réponse JSON
            var labels = [];
            var dataValues = [];

            data.forEach(function (item) {
                labels.push(item.domaine_projet);
                dataValues.push(item.total);
            });

            // crée un graphique à secteurs avec les données spécifiées
            var myChart = new Chart(document.getElementById("myChart"), {
                type: "doughnut",
                data: {
                    labels: labels,
                    datasets: [{
                        backgroundColor: [
                            "#444492",
                            "#3ba99c",
                            "#69d1c5",
                            "#7ebce6"
                        ],
                        data: dataValues
                    }]
                },
                options: {
                    title: {
                        display: false, // pas de titre
                        text: "Nombre de projets par domaine"
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
    });
}
