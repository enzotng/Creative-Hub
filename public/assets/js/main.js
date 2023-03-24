window.onload = function () {

    const header = document.querySelector('header');
    const searchIcon = header.querySelector('.bi-search');
    const searchOverlay = header.querySelector('.search-overlay');
    const searchInput = header.querySelector('input[name="search"]');
    const searchForm = header.querySelector('form');

    searchIcon.addEventListener('click', () => {
        header.classList.add('search-active');
        searchInput.focus();
    });

    searchOverlay.addEventListener('click', (event) => {
        if (event.target === searchOverlay) {
            header.classList.remove('search-active');
        }
    });

    searchForm.addEventListener('submit', (event) => {
        event.preventDefault();

        // Faire une recherche...
        // Faire une recherche
        const searchForm = document.querySelector('header form');

        searchForm.addEventListener('submit', (event) => {
            event.preventDefault();

            const searchInput = document.querySelector('header input[name="search"]');
            const searchValue = searchInput.value.toLowerCase();
            const projects = document.querySelectorAll('.project');

            projects.forEach((project) => {
                const title = project.querySelector('.project-title').textContent.toLowerCase();
                const description = project.querySelector('.project-description').textContent.toLowerCase();

                if (title.includes(searchValue) || description.includes(searchValue)) {
                    project.style.display = 'block';
                } else {
                    project.style.display = 'none';
                }
            });
        });

    });


    const projetsSection = document.querySelector('.projets_section');
    const projetsItems = document.querySelectorAll('.projets_item');
    const projetsItemWidth = projetsItems[0].offsetWidth;

    let projetIndex = 0;
    const projets = document.querySelectorAll('.projets_section > div');
    const nbProjets = projets.length;
    const slider = document.querySelector('.projets_section');
    const arrowGauche = document.querySelector('.arrow_gauche');
    const arrowDroite = document.querySelector('.arrow_droite');
    let translateX = 0;

    // On crée une copie des projets pour le défilement illimité
    slider.appendChild(projets[0].cloneNode(true));
    slider.prepend(projets[nbProjets - 1].cloneNode(true));

    // On réinitialise le défilement au premier projet
    slider.style.transform = `translateX(-${projetIndex * (100 / (nbProjets + 2))}%)`;

    // On ajoute les écouteurs d'événements aux flèches
    arrowGauche.addEventListener('click', () => {
        if (projetIndex <= 0) return;

        projetIndex--;
        slider.style.transform = `translateX(-${projetIndex * (100 / (nbProjets + 2))}%)`;
    });

    arrowDroite.addEventListener('click', () => {
        if (projetIndex >= nbProjets + 1) return;

        projetIndex++;
        slider.style.transform = `translateX(-${projetIndex * (100 / (nbProjets + 2))}%)`;
    });

    // On ajoute l'écouteur d'événement pour la touche de direction gauche
    document.addEventListener('keydown', (event) => {
        if (event.key === 'ArrowLeft') {
            if (projetIndex <= 0) return;

            projetIndex--;
            slider.style.transform = `translateX(-${projetIndex * (100 / (nbProjets + 2))}%)`;
        }
    });

    // On ajoute l'écouteur d'événement pour la touche de direction droite
    document.addEventListener('keydown', (event) => {
        if (event.key === 'ArrowRight') {
            if (projetIndex >= nbProjets + 1) return;

            projetIndex++;
            slider.style.transform = `translateX(-${projetIndex * (100 / (nbProjets + 2))}%)`;
        }
    });

    // On ajoute l'écouteur d'événement pour le redimensionnement de la fenêtre
    window.addEventListener('resize', () => {
        slider.style.transition = 'none';
        slider.style.transform = `translateX(-${projetIndex * (100 / (nbProjets + 2))}%)`;
    });

    // On ajoute l'écouteur d'événement pour le début du mouvement de la souris
    slider.addEventListener('mousedown', (event) => {
        slider.style.cursor = 'grabbing';
        const startX = event.clientX;
        const move = (event) => {
            const diffX = event.clientX - startX;
            translateX = projetIndex * (100 / (nbProjets + 2)) + (diffX / window.innerWidth) * 100;
            slider.style.transform = `translateX(-${translateX}%)`;
        };
        const stop = () => {
            slider.style.cursor = 'grab';
            window.removeEventListener('mousemove', move);
            window.removeEventListener('mouseup', stop);
            const diffTranslateX = translateX - (projetIndex * (100 / (nbProjets + 2)));
            if (Math.abs(diffTranslateX) > 15) {
                if (diffTranslateX > 0) {
                    if (projetsSection.lastElementChild.previousElementSibling.style.gridColumnStart != '1') {
                        projetsSection.appendChild(projetsSection.firstElementChild);
                    }
                } else {
                    if (projetsSection.firstElementChild.nextElementSibling.nextElementSibling.style.gridColumnStart != '7') {
                        projetsSection.insertBefore(projetsSection.lastElementChild, projetsSection.firstElementChild);
                    }
                }
            }
        };

        slider.style.transition = 'transform 0.3s ease';
        slider.style.transform = `translateX(-${translateX}%)`;

        window.addEventListener('mousemove', move);
        window.addEventListener('mouseup', stop);
    });
};