// Evaluar en localStorage si existe variable del sidebar para recordar
const sideBarLocal = localStorage.getItem('sideBar');
const bodyLocal = document.querySelector('body');

if(sideBarLocal == 'true'){
    // console.log('es trueee');
    bodyLocal.classList.remove('g-sidenav-hidden');
    bodyLocal.classList.add('g-sidenav-pinned');
} 

const sideBar = document.querySelector('.sidenav-toggler');
if(sideBar){
  sideBar.addEventListener('click', (e) => {
    e.preventDefault();
    const body = document.querySelector('body');

    // body.classList.contains('g-sidenav-pinned');
    // console.log(body.classList.contains('g-sidenav-pinned'))
    if(body.classList.contains('g-sidenav-pinned')){
      localStorage.setItem('sideBar',  true);

    // body.classList.remove('g-sidenav-pinned');
    // body.classList.add('g-sidenav-hidden');
    } else {
      localStorage.setItem('sideBar',  false);
    }
    // if(body.classList.contains('g-sidenav-hidden')){
      // body.classList.remove('g-sidenav-hidden');
      // body.classList.add('g-sidenav-pinned');
    // }
  })
}

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
// console.log(pathname)
const claseActivo = $('.menu-lateral');
// console.log(claseActivo[3]);
const dashboard = claseActivo[0];
const categories = claseActivo[1];
const clients = claseActivo[2];
const products = claseActivo[3];
const colors = claseActivo[4];

for (let i = 0; i < claseActivo.length; i++) {
    // console.log(claseActivo[i]);
    // let path = claseActivo[i]['pathname'];
    let uri = new URL(claseActivo[i]['baseURI']);
    // console.log(uri);
    const urlString = uri.search;
    
    // console.log(urlString.split('&'));

    // const str = uri.search;
    // const a = str.indexOf("/edit-product");
  
    // const text = str.substring(a, str.length);
  
    // console.log(text);

    if(pathname == '/tvs/admin/dashboard'){
        $(dashboard).removeClass('text-dark').addClass('active text-white');     
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
