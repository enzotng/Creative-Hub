var items = $("#projets .box_mmi");
var numItems = items.length;
var perPage = 4;

// Masque tous les éléments au-delà de la page 1
items.slice(perPage).hide();

// Initialise la pagination avec les options spécifiées
$('#pagination-container').pagination({
    items: numItems,
    itemsOnPage: perPage,
    prevText: "&laquo;", // texte pour le bouton précédent
    nextText: "&raquo;", // texte pour le bouton suivant
    onPageClick: function (pageNumber) {
        // Affiche les éléments pour la page actuelle et cache les autres
        var showFrom = perPage * (pageNumber - 1);
        var showTo = showFrom + perPage;
        items.hide().slice(showFrom, showTo).show();
    }
});
