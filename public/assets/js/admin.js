function showTable(tableId) {
    // masquer tous les tableaux
    document.querySelectorAll('table').forEach(function (table) {
        table.classList.add('hidden');
    });

    // afficher le tableau correspondant
    document.querySelector('#' + tableId).classList.remove('hidden');
    document.querySelector('#' + tableId).classList.add('animate__animated', 'animate__fadeIn');

    // mettre à jour la classe active de l'élément de navigation cliqué
    document.querySelectorAll('li').forEach(function (li) {
        li.classList.remove('active');
    });
    document.querySelector('li[onclick="showTable(\'' + tableId + '\')"]').classList.add('active');

    // afficher ou masquer la barre de recherche en fonction de l'élément de navigation cliqué
    if (tableId === 'tableUtilisateur') {
        document.querySelector('.searchUtilisateur').classList.remove('hidden');
        document.querySelector('.searchProjet').classList.add('hidden');
    } else if (tableId === 'tableProjet') {
        document.querySelector('.searchProjet').classList.remove('hidden');
        document.querySelector('.searchUtilisateur').classList.add('hidden');
    }
}

// Récupérer l'input de recherche et le tableau des utilisateurs
const searchInput = document.querySelector('input[name="search"]');
const usersTable = document.querySelector('#tableUtilisateur');

// Ajouter un événement d'écoute sur l'input de recherche
searchInput.addEventListener('input', function (event) {
    const searchText = event.target.value.toLowerCase();

    // Récupérer toutes les lignes du tableau des utilisateurs, sauf la première (qui contient les titres des colonnes)
    const userRows = usersTable.querySelectorAll('tr:not(.headerTable)');

    // Parcourir toutes les lignes du tableau des utilisateurs
    userRows.forEach(function (userRow) {
        // Récupérer le nom et l'adresse email de l'utilisateur dans la ligne courante
        const username = userRow.querySelector('.tdUtilisateur').textContent.toLowerCase();
        const userEmail = userRow.querySelector('.tdEmail a').textContent.toLowerCase();

        // Vérifier si le nom ou l'adresse email de l'utilisateur contient le texte recherché
        if (username.indexOf(searchText) >= 0 || userEmail.indexOf(searchText) >= 0) {
            // Si oui, afficher la ligne
            userRow.classList.remove('hidden');
        } else {
            // Sinon, masquer la ligne
            userRow.classList.add('hidden');
        }
    });
});

function filterTable(tableId, searchText) {
    // Récupérer le tableau à filtrer
    var table = document.getElementById(tableId);

    // Récupérer toutes les lignes du tableau, sauf la première (qui contient les titres des colonnes)
    var rows = table.querySelectorAll("tr:not(.headerTable)");

    // Parcourir toutes les lignes du tableau
    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];

        // Récupérer le texte de chaque cellule de la ligne courante
        var cells = row.querySelectorAll("td");
        var cellText = "";

        for (var j = 0; j < cells.length; j++) {
            cellText += cells[j].textContent.toLowerCase() + " ";
        }

        // Vérifier si le texte de la ligne contient le texte recherché
        if (cellText.indexOf(searchText.toLowerCase()) >= 0) {
            // Si oui, afficher la ligne
            row.classList.remove("hidden");
        } else {
            // Sinon, masquer la ligne
            row.classList.add("hidden");
        }
    }
}
