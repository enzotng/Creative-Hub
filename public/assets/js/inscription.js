// const passwordField = document.getElementById("mdp_user");
// const confirmPasswordField = document.getElementById("mdp_user_confirmation");
// const passwordMatchMessage = document.getElementById("password-match-message");
// const passwordLengthMessage = document.getElementById("password-length-message");

// const MIN_PASSWORD_LENGTH = 8;

// if (passwordField && confirmPasswordField && passwordMatchMessage && passwordLengthMessage) {
//     confirmPasswordField.addEventListener("input", () => {
//         const confirmPassword = confirmPasswordField.value;
//         const passwordLength = confirmPassword.length;

//         if (passwordLength >= MIN_PASSWORD_LENGTH) {
//             confirmPasswordField.setCustomValidity("");
//             passwordLengthMessage.textContent = "";
//         } else {
//             confirmPasswordField.setCustomValidity(`Le mot de passe doit contenir au moins ${MIN_PASSWORD_LENGTH} caractères`);
//             passwordLengthMessage.textContent = `${passwordLength}/${MIN_PASSWORD_LENGTH}`;
//         }

//         if (confirmPassword === passwordField.value) {
//             passwordMatchMessage.textContent = "Les deux mots de passe correspondent";
//         } else {
//             passwordMatchMessage.textContent = "";
//         }
//     });
// }
