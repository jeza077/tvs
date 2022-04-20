
dataTableAjax('#tableCategory', 'ajax/datatables/datatable.category.php');


// $.ajax({
//     url: 'ajax/datatable.category.php',
//     success: function (response) {  
//         console.log(response)
//         // console.log(JSON.parse(response))
//     }
// });

/**** Eliminar categorias ****/
$(document).on('click', '#btnDeleteCategory', function (){
    
    const idCategory = $(this).attr('idCategory');
    
    Swal.fire({
        title: '¿Está seguro de querer borrar la categoría?',
        text: "Si no lo está, puede cancelar la acción.",
        icon: 'warning',
        showDenyButton: true,
        // showCancelButton: true,
        confirmButtonColor: '#43a047',
        denyButtonColor: '#f44335',
        confirmButtonText: '¡Sí, borrar!',
        denyButtonText: 'Cancelar',
      }).then(function(result){
        if (result.isConfirmed) {

            const data = {
                idDeleteCategory: idCategory
            }
            // console.log(data)
            // return;
            $.post('ajax/category.php', data, function (response) {
                // console.log(JSON.parse(response));
                // console.log(response);

                const resp = JSON.parse(response);
                if(resp.res === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: resp.msg,
                        confirmButtonColor: '#43a047',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = 'category-list';
                        }
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Algo salio mal, intenta nuevamente.',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = 'category-list';
                        }
                    })
                }
           
            })

        } else if (result.isDenied) {
            Swal.fire('Acción cancelada.', '', 'info')
        }
    });


})


/**** Guardar categoria ****/
const formAgregar = document.querySelector('form#categoryForm')

if(formAgregar){ 
    formAgregar.addEventListener('submit', e => {
            e.preventDefault();
    
            const data = Object.fromEntries(
                new FormData(e.target)
            );
    // console.log(data);
    // return;
            
            $.post('ajax/category.php', data, function(response) {
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
                            window.location = 'category-list';
                        }
                    })
                }
                
                
            })
    
        });
}  


/**** Editar categoría ****/
$(document).on('click', '#btnEditCategory', function (){
    // console.log('holaaa')  
    const idCategory = $(this).attr('idCategory');
    const data = {
        idCategory: idCategory
    }
    
    $.post('ajax/category.php', data, function (response) {
        console.log(JSON.parse(response));
        console.log(response);

        if(response){
            window.location = "index.php?url=edit-category&id="+idCategory;
        } else {
            console.log('no viene resp');
        }

    })
})
const formEditar = document.querySelector('form#editCategoryForm');
if(formEditar){ 
    formEditar.addEventListener('submit', e => {
        e.preventDefault();
        

        const data = Object.fromEntries(
            new FormData(e.target)
        );

        $.post('ajax/category.php', data, function(response) {
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
                        window.location = 'category-list';
                    }
                })
            }
            
            
        })
        
    });
}





