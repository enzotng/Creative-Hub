$(document).ready(function () {
    // Capturer le clic sur le lien "Modifier"
    $('.edit-user-btn').click(function (e) {
        e.preventDefault();
        var userId = $(this).data('user-id'); // Récupérer l'ID utilisateur
        var userRole = $(this).data('user-role'); // Récupérer le rôle utilisateur

        // Pré-remplir le formulaire avec l'ID utilisateur et le rôle existants
        $(this).closest('.tdActions').find('.edit-user-id').val(userId);
        $(this).closest('.tdActions').find('#edit-user-role').val(userRole);

        // Afficher le formulaire de modification avec une animation de fondu
        $(this).closest('.tdActions').find('.edit-user-form').fadeToggle();
    });

    // Capturer le clic sur le lien "Modifier projet"
    $('.edit-projet-btn').click(function (e) {
        e.preventDefault();
        var projetId = $(this).data('projet-id'); // Récupérer l'ID projet
        var projetTitre = $(this).closest('tr').find('.tdTitreProjet').text().trim(); // Récupérer le titre du projet
        var projetDescription = $(this).closest('tr').find('.tdDescription').text().trim(); // Récupérer la description du projet
        var projetDomaine = $(this).data('projet-domaine'); // Récupérer le domaine du projet
        var projetNote = $(this).data('projet-note'); // Récupérer la note du projet             

        // Pré-remplir le formulaire avec l'ID projet et les données existantes
        $(this).closest('.tdActions').find('.edit-projet-id').val(projetId);
        $(this).closest('.tdActions').find('#edit-projet-titre').val(projetTitre);
        $(this).closest('.tdActions').find('#edit-projet-description').val(projetDescription);
        $(this).closest('.tdActions').find('#edit-projet-domaine').val(projetDomaine);
        $(this).closest('.tdActions').find('#edit-projet-note').val(projetNote);

        // Afficher le formulaire de modification projet avec une animation de fade
        $(this).closest('.tdActions').find('.edit-projet-form').fadeIn();
    });

    // Capturer le clic sur le bouton "Enregistrer projet"
    $('.edit-projet-form form').submit(function () {
        // Masquer le formulaire de modification projet avec une animation de fade
        $(this).closest('.edit-projet-form').fadeOut();
    });

    // Capturer le clic sur le bouton "Annuler"
    $('.cancel-edit-user').click(function (e) {
        e.preventDefault();

        // Masquer le formulaire de modification avec une animation de fondu
        $(this).closest('.edit-user-form').fadeToggle();
    });
});

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

    if (tableId === 'tableUtilisateur') {
        // afficher la barre de recherche utilisateur
        document.querySelector('.searchUtilisateur').classList.remove('hidden');
        document.querySelector('.searchProjet').classList.add('hidden');
    
        // afficher le compteur d'utilisateurs
        document.getElementById('compteurUser').classList.remove('hidden');
        document.getElementById('compteurProjets').classList.add('hidden');
    } else if (tableId === 'tableProjet') {
        // afficher la barre de recherche projet
        document.querySelector('.searchProjet').classList.remove('hidden');
        document.querySelector('.searchUtilisateur').classList.add('hidden');
    
        // afficher le compteur de projets
        document.getElementById('compteurProjets').classList.remove('hidden');
        document.getElementById('compteurUser').classList.add('hidden');
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
