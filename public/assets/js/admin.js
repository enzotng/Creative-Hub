// sélectionne le bouton "Modifier le projet"
var modifierUserBtn = document.getElementById("modif-user");

// sélectionne la popup et le bouton "Annuler"
var popupuser = document.getElementById("popup-modif-user");
var cancelBtn = document.querySelector("#cancelBtn");

// ajoute un écouteur d'événement pour le clic sur le bouton "Modifier le projet"
modifierUserBtn.addEventListener("click", function () {
    // affiche la popup
    popupuser.style.display = "block";
});

// ajoute un écouteur d'événement pour le clic sur le bouton "Annuler"
cancelBtn.addEventListener("click", function () {
    // cache la popup
    popupuser.style.display = "none";
});
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// sélectionne le bouton "Modifier le projet"
var modifierProjetBtn = document.getElementById("modif-projet");

// sélectionne la popup et le bouton "Annuler"
var popup = document.getElementById("popup-modif-projet");
var cancelBtn1 = document.querySelector("#cancelBtn1");

// ajoute un écouteur d'événement pour le clic sur le bouton "Modifier le projet"
modifierProjetBtn.addEventListener("click", function () {
    // affiche la popup
    popup.style.display = "block";
});

// ajoute un écouteur d'événement pour le clic sur le bouton "Annuler"
cancelBtn1.addEventListener("click", function () {
    // cache la popup
    popup.style.display = "none";
});