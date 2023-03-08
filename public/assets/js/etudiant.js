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