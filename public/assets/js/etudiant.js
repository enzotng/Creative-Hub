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

    // récupère l'identifiant de l'utilisateur
    var id_user = '<?php echo $user_id; ?>';


    $(document).ready(function () {
        // crée un graphique à secteurs pour afficher le nombre de projets par domaine
        $.ajax({
            url: '/projets/domaine/' + id_user,
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
                                "#e63946",
                                "#40916c",
                                "#e09f3e",
                                "#1d3557"
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
                            position: "bottom", // position de la légende en bas
                            labels: {
                                fontSize: 14,
                                fontColor: "#000000",
                                fontFamily: "Ubuntu", // police spécifique pour la légende
                                paddingTop: 10 // padding top de 10 pixels
                            }
                        }
                    }
                });
            }
        });
    });
}
