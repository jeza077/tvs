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
    [{
        value: 'One',
        label: 'Expired',
        disabled: true
      },
      {
        value: 'Two',
        label: 'Out of Stock',
        selected: true
      }
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


