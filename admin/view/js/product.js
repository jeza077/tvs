
// const nextProduct = document.querySelector('#nextProduct');

// if(nextProduct){
//     nextProduct.addEventListener('click', e => {
//         e.preventDefault();
//         console.log('click')

//         if($("#dataProduct").hasClass("js-active")){
//             console.log('si')
//         $('#dataProduct').removeClass('js-active');
//         $('#dataProduct').addClass('js-active');

//         } else {
//             console.log('no')
//         }

//         // $('#dataProduct').addClass('js-active');
//         // $('#mediaProduct').removeClass('js-active');
//     })
// }

// $('#dataProduct').validate({
    
//     rules: {
//         nameProduct: {
//             required: true,
//             minLength: 2,
//         },
//         category: {
//             required: true,
//         },
//         description: {
//             required: true,
//             minLength: 4
//         }
//     },

//     messages: {
//         nameProduct: {
//             required: 'Necesario',
//             minLength: '2 o mas'
//         },
//         category: {
//             required: 'Necesaria cat'
//         },
//         description: {
//             required: 'Necesaria description',
//             minLength: '4 o mas'
//         }
//     }

// })

dataTableAjax('#tableProducts', 'ajax/datatables/datatable.product.php');
// $.ajax({
//     url: 'ajax/datatables/datatable.product.php',
//     success: function (response) {  
//         console.log(response)
//         // console.log(JSON.parse(response))
//     }
// });


Dropzone.autoDiscover = false;

// $(".dropzone").dropzone({
//     maxFiles: 2000,
//     url: "/tvs/admin/new-product",
//     success: function (file, response) {
//         console.log(file);
//         // console.log(response);
//     }
// });

let arrayImages = [];
let myDropzone = new Dropzone('.dropzone', {
    url: "/tvs/admin/new-product",
    maxFilesize: 2,
    maxFiles: 4,
    acceptedFiles:'image/jpeg, image/jpg, image/png',
    addRemoveLinks: true,
    dictRemoveFile: 'Remover'
})

myDropzone.on('addedfile', file => {
    arrayImages.push(file);
})

myDropzone.on('removedfile', file => {
    let i = arrayImages.indexOf(file);
    arrayImages.splice(i, 1);
})





/**** Guardar un nuevo producto ****/
const productForm = document.querySelector('form#productForm')
if(productForm){
    productForm.addEventListener('submit', e => {
        e.preventDefault();
        
        const data = Object.fromEntries(
            new FormData(e.target)
        );

        // Quitar salto de linea en string de descripcion del producto
        let saveDescription = data.descriptionProduct;
        saveDescription = saveDescription.replace(/(\r\n|\n|\r)/gm,"");

        const saveDataValidated = {
            ...data,
            descriptionProduct: saveDescription,
        }

        Swal.fire({
            title: "Guardando...",
            heightAuto: false,
            showConfirmButton: false,
            allowOutsideClick: false
        })
        Swal.showLoading();
        // return;

        setTimeout(() => {

            $.post('ajax/product.php', saveDataValidated, function(response) {
                console.log(JSON.parse(response));
                console.log(response);
                
                // return;
                const {id_product, nameProduct} = JSON.parse(response);

                if(response){

                    Swal.fire({
                        title: "Subiendo imagenes...",
                        heightAuto: false,
                        showConfirmButton: false,
                        allowOutsideClick: false
                    })
                    Swal.showLoading();
                    // return;
                    
                    setTimeout(() => {
                        let imgStatus = 0;
                        
                        // Guardar imagenes del producto

                        for(let i = 0; i < arrayImages.length; i++) {

                            let imgData = new FormData();
                            imgData.append('file', arrayImages[i]);
                            imgData.append('id_product', id_product);
                            imgData.append('nameP', nameProduct);

                            //  console.log(imgData);
                            //  return;
                    
                            fetch('ajax/product.php', {
                                method: 'POST',
                                body: imgData
                            }).then(res => res.json())
                                .then(data => {
                                    console.log(data);
                                    if(!data){
                                        return;
                                    }
                                });

                            imgStatus++;

                        }


                        if(imgStatus == arrayImages.length){

                            Swal.fire({
                                icon: 'success',
                                title: 'Producto guardado correctamente.',
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = 'product-list';
                                }
                            })

                        } else {
                            console.log('algo salio mal');
                        }
                    }, 2000);


                } else {
                    console.log('no guardado')
                }
                // return;
                // const resp = JSON.parse(response);
                // if(resp.res === 'success') {
                //     Swal.fire({
                //         icon: 'success',
                //         title: resp.msg,
                //         allowOutsideClick: false
                //     }).then((result) => {
                //         if (result.isConfirmed) {
                //             window.location = 'product-list';
                //         }
                //     })
                // }
                
                
            });
    
        }, 2000);

    })
}


/**** Editar producto ****/
$(document).on('click', '#btnEditProduct', function (){
    // console.log('holaaa')  
    const idProduct = $(this).attr('idProduct');
    const data = {
        idProduct: idProduct
    }
    
    $.post('ajax/product.php', data, function (response) {
        console.log(JSON.parse(response));
        console.log(response);

        if(response){
            window.location = "index.php?url=edit-product&id="+idProduct;
        } else {
            console.log('no viene resp');
        }

    })
})
const formEditProduct = document.querySelector('form#editProductForm');
if(formEditProduct){ 
    formEditProduct.addEventListener('submit', e => {
        e.preventDefault();
        

        const data = Object.fromEntries(
            new FormData(e.target)
        );

        // Quitar salto de linea en string de descripcion del producto
        let editDescription = data.editDescriptionProduct;
        editDescription = editDescription.replace(/(\r\n|\n|\r)/gm,"");
        
        const dataValidated = {
            ...data,
            editDescriptionProduct: editDescription
        }

        // console.log((dataValidated));
        // return

        $.post('ajax/product.php', dataValidated, function(response) {
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
                        window.location = 'product-list';
                    }
                })
            }
            
            
        })
        
    });
}


/**** Eliminar un producto ****/
$(document).on('click', '#btnDeleteProduct', function (){
    
    const idProduct = $(this).attr('idProduct');

    // console.log(idProduct);
    // return;
    
    Swal.fire({
        title: '¿Está seguro de querer borrar el producto?',
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
                idDeleteProduct: idProduct
            }
            // console.log(data)
            // return;
            $.post('ajax/product.php', data, function (response) {
                console.log(JSON.parse(response));
                console.log(response);

                const resp = JSON.parse(response);
                if(resp.res === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: resp.msg,
                        confirmButtonColor: '#43a047',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = 'product-list';
                        }
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Algo salio mal, intenta nuevamente.',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = 'product-list';
                        }
                    })
                }
           
            })

        } else if (result.isDenied) {
            Swal.fire('Acción cancelada.', '', 'info')
        }
    });


})
