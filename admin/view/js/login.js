$(function() {

    // Evaluar en localStorage si existe un email para recordar
    const emailLS = localStorage.getItem('email');

    if(emailLS){
        $('#emailLogin').val(emailLS)
    } else {
        $('#emailLogin').val()
        // console.log(emailLS)
    }

    // Validad formato de correo sea el correcto
    const emailValue = document.getElementById('emailLogin');
    if(emailValue){

        emailValue.addEventListener('keyup', e => {
            e.preventDefault();

            // console.log(e.target.value);
            if(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/.test(e.target.value)){
                
                emailValue.classList.remove('invalid');

            } else {
                
                emailValue.classList.add('invalid');
            }
        });
    }
    

    // Login
    $('#login-form').submit(function(e) {
        e.preventDefault();

        const data = {
            email: $('#emailLogin').val(),
            password: $('#passwordLogin').val()
        }

        // Validar correo y contraseña no vengan vacios
        if(data.email.length === 0 || data.password.length === 0){
            document.querySelector('#alertLogin').classList.add('formulario__mensaje-error-activo');
            setTimeout(() => {
                document.querySelector('#alertLogin').classList.remove('formulario__mensaje-error-activo');
            }, 5000)
        } else {

            // Guardar el usuario en Localstorage
            const emailLocalStorage = localStorage.getItem('email'); 
            if( $('#rememberMe').prop('checked') && !emailLocalStorage ){

                localStorage.setItem('email',  data.email);
                // console.log('Si check');

            } else if( $('#rememberMe').prop('checked') && emailLocalStorage !== '' && emailLocalStorage !== data.email ) {
        
                localStorage.removeItem('email');
                localStorage.setItem('email',  data.email);

            } else {

                localStorage.removeItem('email');
                localStorage.setItem('email',  data.email);

            }
            

            $.post('ajax/login.php', data, function(response) {
                // console.log(JSON.parse(response));
                // console.log(response);
                // return;
                const resp = JSON.parse(response);
                if(resp.msg === 'logueado'){

                    // console.log('Logueado!');
                    Swal.fire({
                        icon: 'success',
                        title: '¡Bienvenido!',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = 'dashboard';
                        }
                    })

                } else {

                    $('#remember').after('<div class="alert alert-danger text-white" id="alertError" role="alert">'+
                    '<strong>¡Error!</strong> Correo o contraseña incorrectos, intente nuevamente. </div>');

                    setTimeout(() => {
                        $('#alertError').fadeOut(400, function() { $(this).remove(); });
                    }, 5000);
                    // console.log('Email o contraseña incorrectas, intente nuevamente!');
                }

            });
        }


    });


    // Cerrar sesión
    $('#logout').click(function(e) {
        e.preventDefault();
        // console.log('Logout')
        const data = {
            logout: 'Logout'
        }

        $.post('ajax/login.php', data, function(res) {
            console.log(res);
            if(res === 'true') {
                // console.log('salio');
                window.location = 'login';
            }
        })

    });
});