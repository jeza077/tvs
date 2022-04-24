// COLOR PICKER
$('.color-picker').minicolors({
    animationEasing: 'swing',
    position: 'top right',
    defaultValue: '#ff6161',
    format: 'hex'
});

// Mostrar Datatble colores
dataTableAjax('#tableColor', 'ajax/datatables/datatable.color.php');


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
                // .then((result) => {
                //     if (result.isConfirmed) {
                //         window.location = 'color-list';
                //     }
                // })
            }
            
        })
    })
}