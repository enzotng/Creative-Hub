function activerInputs() {
    document.querySelectorAll('.input_field').forEach(function (input) {
        input.removeAttribute('disabled');
    });
    document.querySelector('#valider-btn').style.display = 'inline-block';
    document.querySelector('#modifier-btn').style.display = 'none';
}