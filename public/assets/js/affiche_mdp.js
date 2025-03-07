document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.getElementById('toggle-all-passwords');
    const newPasswordField = document.getElementById('new-passwd');
    const confirmPasswordField = document.getElementById('confirm-passwd');

    toggleButton.addEventListener('click', () => {
        const isPasswordHidden = newPasswordField.type === 'password';

        newPasswordField.type = isPasswordHidden ? 'text' : 'password';
        if (confirmPasswordField) {
            confirmPasswordField.type = isPasswordHidden ? 'text' : 'password';
        }

        toggleButton.textContent = isPasswordHidden ? 'Cacher' : 'Afficher';
    });
});