// COLOR PICKER
$('.color-picker').minicolors({
    animationEasing: 'swing',
    position: 'top right',
    defaultValue: '#ff6161',
    format: 'hex'
});

// Mostrar Datatble colores
dataTableAjax('#tableColor', 'ajax/datatables/datatable.color.php');

/*** Guardar color ***/
const colorPicker = document.querySelector('form#colorForm');

if(colorPicker){
    colorPicker.addEventListener('submit', e => {
        e.preventDefault();
        
        const data = Object.fromEntries(
            new FormData(e.target)
        )

        // console.log(data);

        $.post('ajax/color.php', data, function (response){
            console.log(response);

            const resp = JSON.parse(response);
            if(resp.res === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: resp.msg,
                    allowOutsideClick: false
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location = 'color-list';
                    }
                })
            }
            
        })
    })
}


/**** Editar color ****/    
$(document).on('click', '#btnEditColor', function (){

    const idColor = $(this).attr('idColor');
    const data = {
        idColor: idColor
    }
    
    $.post('ajax/color.php', data, function (response) {
        console.log(JSON.parse(response));
        console.log(response);

        if(response){
            window.location = "index.php?url=edit-color&id="+idColor;
        } else {
            console.log('no viene resp');
        }

    })
})

const formEditarColor = document.querySelector('form#editColorForm');
if(formEditarColor){ 
    formEditarColor.addEventListener('submit', e => {
        e.preventDefault();
        

        const data = Object.fromEntries(
            new FormData(e.target)
        );
        // console.log(data);
        // return;

        $.post('ajax/color.php', data, function(response) {
            // console.log(JSON.parse(response));
            // console.log(response);
            
            // return;
            const resp = JSON.parse(response);
            if(resp.res === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: resp.msg,
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = 'color-list';
                    }
                });

            } else {
             Swal.fire({
                    icon: 'error',
                    title: resp.msg,
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = 'color-list';
                    }
                })
            }
            
            
        })
        
    });
}