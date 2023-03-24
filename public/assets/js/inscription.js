const togglePassword = document.querySelector('.toggle-password');
const confirmertogglePassword = document.querySelector('.toggle-password2');
const password = document.querySelector('#mdp_user');
const confirmerPassword = document.querySelector('#mdp_user_confirmation');

togglePassword.addEventListener('click', function (e) {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.querySelector('i').classList.toggle('bi-eye');
    this.querySelector('i').classList.toggle('bi-eye-slash');
});

confirmertogglePassword.addEventListener('click', function (e) {
    const type = confirmerPassword.getAttribute('type') === 'password' ? 'text' : 'password';
    confirmerPassword.setAttribute('type', type);
    this.querySelector('i').classList.toggle('bi-eye');
    this.querySelector('i').classList.toggle('bi-eye-slash');
});