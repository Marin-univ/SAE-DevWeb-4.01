document.getElementById('toggle-passwords').addEventListener('click', () => {
    const passwordFields = [document.getElementById('password'), document.getElementById('confirm_password')];
    passwordFields.forEach(field => {
        if (field.type === 'password') {
            field.type = 'text';
        } else {
            field.type = 'password';
        }
    });
    const button = document.getElementById('toggle-passwords');
    button.textContent = button.textContent === 'Afficher' ? 'Cacher' : 'Afficher';
});