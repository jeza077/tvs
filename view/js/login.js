$(function() {

    // Evaluar en localStorage si existe un email para recordar
    const emailLS = localStorage.getItem('email');

    if(emailLS){
        $('#emailLogin').val(emailLS)
    } else {
        $('#emailLogin').val()
        // console.log(emailLS)
    }



    // Login
    $('#login-form').submit(function(e) {
        e.preventDefault();

        const data = {
            email: $('#emailLogin').val(),
            password: $('#passwordLogin').val()
        }

        // Guardar el usuario en Localstorage
        const emailLocalStorage = localStorage.getItem('email'); 
        if( $('#rememberMe').prop('checked') && !emailLocalStorage ){
            localStorage.setItem('email',  data.email);
            
            // console.log('Si check');

        } else if( $('#rememberMe').prop('checked') && emailLocalStorage !== '' && emailLocalStorage !== data.email ) {
            // if( emailLocalStorage !== '' && emailLocalStorage !== data.email ) {
                localStorage.removeItem('email');
                localStorage.setItem('email',  data.email);
            // }     

            // console.log('Si check', data.email);
            // const emailLocalStorage = localStorage.setItem('email',  data.email);
        } else {
            // if( !emailLocalStorage ) {
                localStorage.removeItem('email');
                localStorage.setItem('email',  data.email);
            // }     
            // console.log('No check');
        }
        

        $.post('ajax/login.php', data, function(response) {
            // console.log(JSON.parse(response).msg);
            console.log(response);
            const resp = JSON.parse(response);
            // return;
            if(resp.msg === 'logueado'){
                console.log('Logueado!');
                window.location = 'dashboard';
            } else {
                console.log('Email o contraseña incorrectas, intente nuevamente!');
            }

        })

    });


    // Cerrar sesión
    $('#logout').click(function(e) {
        e.preventDefault();
        console.log('Logout')
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