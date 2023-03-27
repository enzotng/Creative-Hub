// exécute le code lorsque la page est entièrement chargée
window.onload = function () {
    // récupère les éléments de la page nécessaires
    const toggleSwitch = document.querySelector('.toggle-switch input[type="checkbox"]');
    const heroSection = document.querySelector('.hero');
    const footerSection = document.querySelector('.footer');
    const headerSection = document.querySelector('.header');
    const projetsSection = document.querySelector('.projets');

    // ajoute un événement de changement lorsque l'interrupteur est activé ou désactivé
    toggleSwitch.addEventListener('change', function () {
        if (toggleSwitch.checked) { // si l'interrupteur est activé
            // ajout des classes pour activer le mode sombre
            heroSection.classList.add('dark_mode_hero');
            projetsSection.classList.add('dark_mode_hero');
            footerSection.classList.add('dark_mode_footer');
            headerSection.classList.add('dark_mode_header');
            document.body.classList.toggle('dark_mode'); // ajoute une classe de style spécifique à l'ensemble du corps de la page
        } else { // si l'interrupteur est désactivé
            // suppression des classes pour désactiver le mode sombre
            heroSection.classList.remove('dark_mode_hero');
            projetsSection.classList.remove('dark_mode_hero');
            footerSection.classList.remove('dark_mode_footer');
            headerSection.classList.remove('dark_mode_header');
            document.body.classList.toggle('dark_mode'); // supprime la classe de style spécifique de l'ensemble du corps de la page
        }
    });
};
