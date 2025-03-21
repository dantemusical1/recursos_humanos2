function validateInput() {

    const input = document.getElementById('txtusuario');

    const feedback = document.getElementById('feedback');

    const validFeedback = document.getElementById('valid-feedback');

    const value = input.value;


    // Verificar si el valor es un número

    const isNumeric = /^\d*$/.test(value);

    const length = value.length;


    if (!isNumeric || length < 6 || length > 11) {

        input.classList.remove('is-valid');

        input.classList.add('is-invalid');

        feedback.style.display = 'block';

        validFeedback.style.display = 'none';

    } else {

        input.classList.remove('is-invalid');

        input.classList.add('is-valid');

        feedback.style.display = 'none';

        validFeedback.style.display = 'block';

    }

}


function validatePasswordInput() {

    const input = document.getElementById('exampleInputPassword1');

    const feedback = document.getElementById('password-feedback');

    const validFeedback = document.getElementById('password-valid-feedback');

    const length = input.value.length;


    if (length < 5) {

        input.classList.remove('is-valid');

        input.classList.add('is-invalid');

        feedback.style.display = 'block';

        validFeedback.style.display = 'none';

    } else {

        input.classList.remove('is-invalid');

        input.classList.add('is-valid');

        feedback.style.display = 'none';

        validFeedback.style.display = 'block';

    }

}


function togglePasswordVisibility() {

    const passwordInput = document.getElementById('exampleInputPassword1');

    const showPasswordCheckbox = document.getElementById('showPassword');


    if (showPasswordCheckbox.checked) {

        passwordInput.type = 'text'; // Cambia a texto para mostrar la contraseña

    } else {

        passwordInput.type = 'password'; // Cambia a contraseña para ocultarla

    }

}