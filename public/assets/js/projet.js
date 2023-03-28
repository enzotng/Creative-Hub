const constBox = document.querySelectorAll('.projets_box');

function expand(item, i) {
  constBox.forEach(function (it, ind) {
    if (i === ind) return;
    it.clicked = false;
  });
  gsap.to(constBox, {
    width: item.clicked ? '20vw' : '15vw',
    duration: 2,
    ease: 'elastic(1, .6)'
  });
  
  item.clicked = !item.clicked;
  gsap.to(item, {
    width: item.clicked ? '35vw' : '20vw',
    duration: 2.5,
    ease: 'elastic(1, .3)'
  });
}

constBox.forEach(function (item, i) {
  item.clicked = false;
  item.addEventListener('click', function () {
    expand(item, i);
  });
});
