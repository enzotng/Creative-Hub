window.onload = function () {
    const toggleSwitch = document.querySelector('.toggle-switch input[type="checkbox"]');
    const heroSection = document.querySelector('.hero');
    const footerSection = document.querySelector('.footer');
    const headerSection = document.querySelector('.header');
    const projetsSection = document.querySelector('.projets');
    

    toggleSwitch.addEventListener('change', function () {
        if (toggleSwitch.checked) {
            heroSection.classList.add('dark_mode_hero');
            projetsSection.classList.add('dark_mode_hero');
            footerSection.classList.add('dark_mode_footer');
            headerSection.classList.add('dark_mode_header');
            document.body.classList.toggle('dark_mode');
        } else {
            heroSection.classList.remove('dark_mode_hero');
            projetsSection.classList.remove('dark_mode_hero');
            footerSection.classList.remove('dark_mode_footer');
            headerSection.classList.remove('dark_mode_header');
            document.body.classList.toggle('dark_mode');
        }
    });
};