// définit une fonction pour activer tous les champs de saisie de formulaire
function activerInputs() {
    // parcourt tous les éléments d'entrée de formulaire et supprime l'attribut "disabled"
    document.querySelectorAll('.input_field').forEach(function (input) {
        input.removeAttribute('disabled');
    });
    // affiche le bouton de validation et masque le bouton de modification
    document.querySelector('#valider-btn').style.display = 'inline-block';
    document.querySelector('#modifier-btn').style.display = 'none';
}