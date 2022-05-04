//*==========================================
//*	   FUNCION PARA VALIDAR CONTRASEÑA	
//*===========================================
const expresiones = {
	// usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	// nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{8,16}$/, // 8 a 16 digitos.
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	// telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

const campos = {
	email: false,
	password: false,
}

const validateForm = (e) => {
    switch (e.target.name) {
        case 'profileEmail':
            validarCampo(expresiones.email, e.target, 'email');
            break;
        case 'profilePassword':
            validarCampo(expresiones.password, e.target, 'password');
            validatePassword2();
        break;
        case 'confirmarProfilePassword':
            validatePassword2();
        break;
    }

}

const validarCampo = (expresion, input, campo) => {
    if(expresion.test(input.value)){
		document.getElementById(`group_${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`group_${campo}`).classList.add('formulario__grupo-correcto');
		// document.querySelector(`#group_${campo} i`).classList.add('fa-check-circle');
		// document.querySelector(`#group_${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`.formulario__input-error-${campo}`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`group_${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`group_${campo}`).classList.remove('formulario__grupo-correcto');
		// document.querySelector(`#group_${campo} i`).classList.add('fa-times-circle');
		// document.querySelector(`#group_${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`.formulario__input-error-${campo}`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}


const validatePassword2 = () => {
    const inputPassword1 = document.getElementById('profilePassword');
    const inputPassword2 = document.getElementById('confirmarProfilePassword');

    if(inputPassword1.value !== inputPassword2.value){
        document.getElementById(`group_password2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`group_password2`).classList.remove('formulario__grupo-correcto');
		// document.querySelector(`#group_password2 i`).classList.add('fa-times-circle');
		// document.querySelector(`#group_password2 i`).classList.remove('fa-check-circle');
		document.querySelector(`.formulario__input-error-password2`).classList.add('formulario__input-error-activo');
		campos['password'] = false;
    } else {
        document.getElementById(`group_password2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`group_password2`).classList.add('formulario__grupo-correcto');
		// document.querySelector(`#group_password2 i`).classList.add('fa-times-circle');
		// document.querySelector(`#group_password2 i`).classList.remove('fa-check-circle');
		document.querySelector(`.formulario__input-error-password2`).classList.remove('formulario__input-error-activo');
		campos['password'] = true;
    }
}


const inputs = document.querySelectorAll('#formSaveProfile input');

inputs.forEach((input) => {
    input.addEventListener('keyup', validateForm);
    input.addEventListener('blur', validateForm);
})



document.querySelector('#containerConfirmarPasswordProfile').style.display = 'none';
document.querySelector('#saveProfile').style.display = 'none';
document.querySelector('#cancelProfile').style.display = 'none';

/** Boton editar perfil **/
const editProfile = document.querySelector('#editProfile');
if(editProfile){
    editProfile.addEventListener('click', e => {
        e.preventDefault();
        document.getElementById('profileEmail').readOnly = false;
        document.getElementById('profilePassword').readOnly = false;
        document.getElementById('profilePassword').disabled = false;
        document.getElementById('profileEmail').focus();
        
        document.querySelector('#profile').classList.remove('col-sm-5');
        document.querySelector('#profile').style.display = 'none';

        // Ocultar boton editar y Mostrar boton guardar al editar datos perfil
        document.querySelector('#editProfile').style.display = 'none';
        document.querySelector('#saveProfile').style.display = '';
        document.querySelector('#cancelProfile').style.display = '';

        
        document.querySelector('#containerMyAccount').classList.remove('col-sm-7');
        document.querySelector('#containerEmailProfile').classList.remove('col-sm-6');
        document.querySelector('#containerPasswordProfile').classList.remove('col-sm-6');
        document.querySelector('#containerEmailProfile').classList.add('col-sm-4');
        document.querySelector('#containerPasswordProfile').classList.add('col-sm-4');
        document.querySelector('#containerConfirmarPasswordProfile').style.display = '';
        
    })
}

/** Boton cancelar edicion perfil **/
const cancelProfile = document.querySelector('#cancelProfile');
if(cancelProfile){
    cancelProfile.addEventListener('click', e => {
        e.preventDefault();
        document.getElementById('profileEmail').readOnly = true;
        document.getElementById('profilePassword').readOnly = true;
        document.getElementById('profilePassword').disabled = true;
        // document.getElementById('profileEmail').focus();
        
        document.querySelector('#profile').classList.add('col-sm-5');
        document.querySelector('#profile').style.display = '';

        // Ocultar boton editar y Mostrar boton guardar al editar datos perfil
        document.querySelector('#editProfile').style.display = '';
        document.querySelector('#saveProfile').style.display = 'none';
        document.querySelector('#cancelProfile').style.display = 'none';

        
        document.querySelector('#containerMyAccount').classList.add('col-sm-7');
        document.querySelector('#containerEmailProfile').classList.add('col-sm-6');
        document.querySelector('#containerPasswordProfile').classList.add('col-sm-6');
        document.querySelector('#containerEmailProfile').classList.remove('col-sm-4');
        document.querySelector('#containerPasswordProfile').classList.remove('col-sm-4');
        document.querySelector('#containerConfirmarPasswordProfile').style.display = 'none';

        document.getElementById(`group_email`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`group_email`).classList.add('formulario__grupo-correcto');
		document.querySelector(`.formulario__input-error-email`).classList.remove('formulario__input-error-activo');

        document.getElementById(`group_password`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`group_password`).classList.add('formulario__grupo-correcto');
		document.querySelector(`.formulario__input-error-password`).classList.remove('formulario__input-error-activo');
        document.getElementById(`group_password2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`group_password2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`.formulario__input-error-password2`).classList.remove('formulario__input-error-activo');
        saveProfile.reset();
        
    })
}

/*** Guardar cambios de datos en perfil usuario ***/
const saveProfile = document.querySelector('#formSaveProfile');
if(saveProfile){
    saveProfile.addEventListener('submit', e => {
        e.preventDefault();
        // console.log(campos);
        if(campos.email){
            // console.log('llenos')
            const data = Object.fromEntries(
                new FormData(e.target)
            );
                
            // console.log(data);
            // return; 

            $.post('ajax/user.php', data, function(response){
                // console.log(JSON.parse(response));
                // console.log(response);

                const resp = JSON.parse(response);

                if(resp.res === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: resp.msg,
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = 'profile';
                        }
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: resp.msg,
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = 'profile';
                        }
                    })
                }
            });

        } else {
            console.log('vacios')
            document.getElementById('formulario__mensaje-error').classList.add('formulario__mensaje-error-activo');
            setTimeout(() => {
                document.getElementById('formulario__mensaje-error').classList.remove('formulario__mensaje-error-activo');
            }, 5000);
        }
        
    })
}

/** Validar contraseña **/
//*==========================================
//*		FUNCION REQUISITOS PARA CONTRASEÑA
//*===========================================
const letra = /[A-z]/;
const mayus = /[A-Z]/;
const minus = /[a-z]/;
const num = /\d/;
const caracEspe = /[!@#$%*-,_+?¡¿=&.]/;
const long = /^.{8,16}$/;

function requisitosPassword(posicion){  
    
    $(".nueva-password").keyup(function() { 
        var editPassword = $(this).val();
        
        //validar que tenga una letra
        if(editPassword.match(letra)){
            $(".letter").removeClass('invalid').addClass('valid');
        } else {
            $(".letter").removeClass('valid').addClass('invalid');
        }
    
        //validar que tenga una letra Mayuscula
        if(editPassword.match(mayus)){
            $(".capital").removeClass('invalid').addClass('valid');
        } else {
            $(".capital").removeClass('valid').addClass('invalid');
        }
    
        //validar que tenga un numero
        if(editPassword.match(num)){
            $(".number").removeClass('invalid').addClass('valid');
        } else {
            $(".number").removeClass('valid').addClass('invalid');
        }
    
        //validar que tenga un caracter especial
        if(editPassword.match(caracEspe)){
            $(".special").removeClass('invalid').addClass('valid');
        } else {
            $(".special").removeClass('valid').addClass('invalid');
        }

        //validar longitud
        if(editPassword.match(long)){
            $(".length").removeClass('invalid').addClass('valid');
        } else {
            $(".length").removeClass('valid').addClass('invalid');
        }
        
    }).focus(function() {  
        // $(".requisito-password").show();
        Swal.fire({
            // icon: "info",
            width: 800,
            html: 
            '<i class="rp-info fas fa-info-circle"></i> ' +
              '<div class="requisito-password"> ' +
              '<h4>La contraseña debe cumplir con los siguientes requerimientos:</h4> ' +
                '<ul> ' +
                '<li class="letter">Al menos debe tener <strong>una letra</strong></li> ' +
                '<li class="capital">Al menos debe tener <strong>una letra en mayúscula</strong></li> ' +
                '<li class="number">Al menos debe tener <strong>un número</strong></li> ' +
                '<li class="special">Al menos debe tener <strong>un caracter especial</strong></li> ' +
                '<li class="length">Al menos debe tener <strong>8 caracteres como mínimo y 16 máximo</strong></li> ' +
                '</ul> ' + 
              '</div>',
            toast: true,
            position: posicion,
            showConfirmButton: false,
        })
        // $(".login-box").addClass('contenedor-rp');
    }).blur(function() { 
        // $(".requisito-password").hide();
        Swal.close();
        // $(".login-box").removeClass('contenedor-rp');
    });
}

// requisitosPassword('bottom');

