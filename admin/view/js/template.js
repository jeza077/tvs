// FUNCION DATATABLES DINAMICA
const dataTableAjax = (selector, archivoAjax) => {

    $(selector).DataTable( {
        "responsive": true,
        "autoWidth": false,    
        "ajax": archivoAjax,
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        "language": {
    
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "Mostrar _MENU_ registros",
          "sZeroRecords":    "No se encontraron resultados",
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
          "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
          "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix":    "",
          "sSearch":         "Buscar:",
          "sUrl":            "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
    
        }
    
    } );
    
}


// CHOICES
if (document.getElementById('choices-category')) {
  var element = document.getElementById('choices-category');
  const example = new Choices(element, {
    searchEnabled: false
  });
};

if (document.getElementById('choices-sizes')) {
  var element = document.getElementById('choices-sizes');
  const example = new Choices(element, {
    searchEnabled: false
  });
};

if (document.getElementById('choices-currency')) {
  var element = document.getElementById('choices-currency');
  const example = new Choices(element, {
    searchEnabled: false
  });
};

if (document.getElementById('choices-tags')) {
  var tags = document.getElementById('choices-tags');
  const examples = new Choices(tags, {
    removeItemButton: true
  });

  examples.setChoices(
    [
    ],
    'value',
    'label',
    false,
  );
}

// QUILL
if (document.getElementById('edit-deschiption')) {
  var quill = new Quill('#edit-deschiption', {
    theme: 'snow' // Specify theme in configuration
  });
};


//*============================================
//*     SIDEBAR MENU ACTIVO COLOR AZUL
//*============================================
const pathname = window.location.pathname;
console.log(pathname)
const claseActivo = $('.menu-lateral');
console.log(claseActivo[3]);
const categories = claseActivo[1];
const clients = claseActivo[2];
const products = claseActivo[3];
const colors = claseActivo[4];

for (let i = 0; i < claseActivo.length; i++) {
    console.log(claseActivo[i]['href']);
    // let path = claseActivo[i]['pathname'];
    if(pathname == claseActivo[i]['href']){
        $(claseActivo[i]).removeClass('text-dark').addClass('active text-white');     
        break;
    }
    if(pathname == '/tvs/admin/category-list' || pathname == '/tvs/admin/new-category'){
      $(categories).removeClass('text-dark');
      $(categories).addClass('active text-white');
    }
    if(pathname == '/tvs/admin/client-list' || pathname == '/tvs/admin/new-client'){
      $(clients).removeClass('text-dark');
      $(clients).addClass('active text-white');
    }
    if(pathname == '/tvs/admin/product-list' || pathname == '/tvs/admin/new-product'){
      $(products).removeClass('text-dark');
      $(products).addClass('active text-white');
    }
    if(pathname == '/tvs/admin/color-list' || pathname == '/tvs/admin/new-color'){
      $(colors).removeClass('text-dark');
      $(colors).addClass('active text-white');
    }
}
