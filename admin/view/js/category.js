
dataTableAjax('#tableCategory', 'ajax/datatable.category.php');


// $.ajax({
//     url: 'ajax/datatable.category.php',
//     success: function (response) {  
//         console.log(response)
//         // console.log(JSON.parse(response))
//     }
// });

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

document.querySelector('form#editCategoryForm')
    .addEventListener('submit', e => {
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



/**** Guardar categoria ****/
document.querySelector('form#categoryForm')
    .addEventListener('submit', e => {
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



