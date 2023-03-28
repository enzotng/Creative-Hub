// récupère les éléments de la page nécessaires
const togglePassword = document.querySelector('.toggle-password');
const password = document.querySelector('#mdp_user');

// ajoute un événement de clic pour le bouton de basculement du mot de passe
togglePassword.addEventListener('click', function (e) {
    // récupère le type d'entrée de mot de passe actuel (texte ou mot de passe)
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    // modifie le type d'entrée de mot de passe pour afficher ou masquer le mot de passe
    password.setAttribute('type', type);
    // bascule les classes de style pour afficher ou masquer l'icône de l'œil
    this.querySelector('i').classList.toggle('bi-eye');
    this.querySelector('i').classList.toggle('bi-eye-slash');
});
