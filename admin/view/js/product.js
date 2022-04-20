
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

// $('#tableProducts').DataTable( {
//     "responsive": true,
//     "autoWidth": false,    
//     "ajax": 'ajax/datatables/datatable.product.php',
//     "deferRender": true,
//     "retrieve": true,
//     "processing": true,
//     "language": {

//       "sProcessing":     "Procesando...",
//       "sLengthMenu":     "Mostrar _MENU_ registros",
//       "sZeroRecords":    "No se encontraron resultados",
//       "sEmptyTable":     "Ningún dato disponible en esta tabla",
//       "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
//       "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
//       "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
//       "sInfoPostFix":    "",
//       "sSearch":         "Buscar:",
//       "sUrl":            "",
//       "sInfoThousands":  ",",
//       "sLoadingRecords": "Cargando...",
//       "oPaginate": {
//       "sFirst":    "Primero",
//       "sLast":     "Último",
//       "sNext":     "Siguiente",
//       "sPrevious": "Anterior"
//       },
//       "oAria": {
//         "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
//         "sSortDescending": ": Activar para ordenar la columna de manera descendente"
//       }

//     }

// } );

const productForm = document.querySelector('form#productForm')
if(productForm){
    productForm.addEventListener('submit', e => {
        e.preventDefault();
        const data = Object.fromEntries(
            new FormData(e.target)
        );

        // console.log(data);
        // return;

        $.post('ajax/product.php', data, function(response) {
            console.log(JSON.parse(response));
            console.log(response);
            
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
            
            
        });

    })
}