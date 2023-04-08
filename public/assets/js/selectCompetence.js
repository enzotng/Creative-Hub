// Ajouter un événement onchange au select de compétences
document.getElementById('competence').addEventListener('change', function () {
    // Récupérer l'ID de la compétence sélectionnée
    const competenceId = this.value;

    // Appeler l'API pour récupérer les AC de la compétence sélectionnée
    fetch('/api/ac/' + competenceId)
        .then(response => response.json())
        .then(data => {
            // Vider le select de AC
            const selectAc = document.getElementById('ac');
            selectAc.innerHTML = '';
            // Ajouter les options de AC en fonction de la réponse de l'API
            data.forEach(ac => {
                const option = document.createElement('option');
                option.value = ac.id_ac;
                option.text = ac.nom_ac;
                selectAc.appendChild(option);
            });
        });
});