// récupère tous les éléments de la classe "projets_box"
const constBox = document.querySelectorAll('.projets_box');

// définit une fonction pour agrandir les éléments de "projets_box" cliqués
function expand(item, i) {
  // parcourt tous les éléments "projets_box" et met à jour le statut "clicked" des autres éléments
  constBox.forEach(function (it, ind) {
    if (i === ind) return;
    it.clicked = false;
  });

  // anime la largeur de tous les éléments "projets_box" pour agrandir ou réduire ceux qui ne sont pas cliqués
  gsap.to(constBox, {
    width: item.clicked ? '20vw' : '15vw',
    duration: 2,
    ease: 'elastic(1, .6)'
  });

  // met à jour le statut "clicked" de l'élément cliqué et anime sa largeur pour l'agrandir ou la réduire
  item.clicked = !item.clicked;
  gsap.to(item, {
    width: item.clicked ? '35vw' : '20vw',
    duration: 2.5,
    ease: 'elastic(1, .3)'
  });
}

// ajoute un écouteur d'événements "click" pour chaque élément "projets_box"
constBox.forEach(function (item, i) {
  // initialise le statut "clicked" de chaque élément à "false"
  item.clicked = false;
  // ajoute un événement de clic pour agrandir l'élément cliqué
  item.addEventListener('click', function () {
    expand(item, i);
  });
});