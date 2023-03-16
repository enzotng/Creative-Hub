window.onload = function () {
    var xValues = ["SAE 302", "Darknet", "SAE 301", "SAE Leclerc"];
    var yValues = [55, 49, 44, 24];
    var barColors = [
        "#111192",
        "#444492",
        "#777792",
        "#0e0e0e"
    ];

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
                display: false,
                text: "Compétences"
            }
        }
    });
}

var items = $(".gridTravaux .travaux");
    var numItems = items.length;
    var perPage = 4;

    items.slice(perPage).hide();

    $('#pagination-container').pagination({
        items: numItems,
        itemsOnPage: perPage,
        prevText: "&laquo;",
        nextText: "&raquo;",
        onPageClick: function (pageNumber) {
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;
            items.hide().slice(showFrom, showTo).show();
        }
    });