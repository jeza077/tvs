document.querySelector('#containerConfirmarPasswordProfile').style.display = 'none';
document.querySelector('#saveProfile').style.display = 'none';
document.querySelector('#cancelProfile').style.display = 'none';

const editProfile = document.querySelector('#editProfile');
if(editProfile){
    editProfile.addEventListener('click', e => {
        e.preventDefault();
        document.getElementById('profileEmail').readOnly = false;
        document.getElementById('profilePassword').readOnly = false;
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

const cancelProfile = document.querySelector('#cancelProfile');
if(cancelProfile){
    cancelProfile.addEventListener('click', e => {
        e.preventDefault();
        document.getElementById('profileEmail').readOnly = true;
        document.getElementById('profilePassword').readOnly = true;
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
        
    })
}

const saveProfile = document.querySelector('#formSaveProfile');
if(saveProfile){
    saveProfile.addEventListener('submit', e => {
        e.preventDefault();

        const data = Object.fromEntries(
            new FormData(e.target)
        );

        // console.log(data);

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
                console.log('Algo salio mal')
            }
        });

    })
}