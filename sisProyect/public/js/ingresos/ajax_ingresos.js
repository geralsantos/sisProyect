function __(id){
        return document.getElementById(id);
}
//-----cambiar idioma a español del dattable -----//
var idioma_es = {
   "sProcessing":     "Procesando...",
   "sLengthMenu":     "Mostrar _MENU_ registros",
   "sZeroRecords":    "No se encontraron resultados",
   "sEmptyTable":     "Ningún dato disponible en esta tabla",
   "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
   "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
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
};
//-----cambiar idioma a español del dattable -----//

//------Obtener datos de la bd mysql-------//
//esta variable será bastante usada por eso es global
var table = $('#myTable').DataTable({
  "destroy":true,
  "oLanguage":  idioma_es,
    "aLengthMenu": [[10,25, 50, 100, 250, 500, -1], [10,25, 50, 100, 250, 500, "Todo"]],
  "sPaginationType": "full_numbers",

  "processing": false,
  "serverSide": true,
  "ajax": "ingresos/dataload",

  "columns":[
    {"data":"idingreso"},
    {"data":"tipo_persona"},
    {"data":"tipo"},
    {"data":"fecha_hora"},
    {"data":"impuesto"},
    {"data":"estado"},

    {"defaultContent":"<i data-id='idingreso' class='fa fa-trash btn btn-danger btn-delete-ingreso' data-toggle='tooltip' data-placement='top' title='' data-original-title='Eliminar'></i><span></span>"

    }
  ] ,
"columnDefs": [
  { className: "cls_ingreso","width": "80px","text-align":"center", "targets": 0 },
  { className: "cls_proveedor","width": "80px","text-align":"center", "targets": 1 },
  { className: "cls_comprobante","width": "250px","text-align":"center", "targets": 2 },
  { className: "cls_fecha","width": "80px","text-align":"center" ,"targets":3},
  { className: "cls_impuesto","width": "80px","text-align":"center" ,"targets":4 },
  {"render": function ( data, type, row ) {
                           if (data == "Activo") {
                                var m = "<small style='font-size:0.9em' class='label bg-green'>"+data+"</small>";
                            }else if(data=="Cancelado"){
                              var m = "<small style='font-size:0.9em' class='label bg-red'>"+data+"</small>";

                            }
                            return m;

                 },
                 "targets": 5
             },  { className: "cls_opcion","text-align":"center" ,"targets":6 }


]
});
//------Obtener datos de la bd mysql-------//

//------Listar los datos obtenidos de la bd mysql-------//
var listar = function(){
 //uso de la variable global y actualizandola//
 table = $('#myTable').DataTable().draw();

}
$(document).ready(function(){

$(function(){


$(document).on('click','table tbody tr',function(e){
  var row = table.row($(this)).data();
  console.log(row);

  window.location.href= "ingresos/detalle/"+row.idingreso;
});
$(document).on('click','table tbody .cls_opcion',function(e){
  //var row = table.row($(this)).data();

  e.stopPropagation();


});

});
$(document).on('click', 'table .btn-delete-ingreso',function(e){
    e.preventDefault();

   var row = $(this).parents('tr');
   var datos = table.row($(this).parents('tr')).data();
   console.log(datos);
   var url2 = 'ingresos/edit/'+datos.idingreso;
  $.get(url2,function(data){
       if(data.success){

         var id = data.ingreso.idingreso;
         var name =datos.tipo;


// ------ alert ------- //
        swal({
           title: "¿Realmente quiere eliminar el Ingreso "+"'"+ name +"'"+ "?",
           text: "No podras recuperar el Ingreso",
           type: "warning",
           showCancelButton: true,
           confirmButtonColor: "#DD6B55",
           confirmButtonText: "Si, quiero Cancelarlo!",
           closeOnConfirm: false,
           html: false
         }, function(data){
           if (data) {
             var url = $('#form-delete').attr('action').replace(':INGRESO_ID',id);
             var data =$('#form-delete').serialize();

             $.post(url,data,function(result){
               if (result) {
                 swal("Eliminado!",
                 "El ingreso "+datos.tipo+" fue Cancelado!",
                 "success");
                    row.fadeOut();
                    listar();
               }

            }).fail(function(result){
              swal("Información!", "El Ingreso no pudo ser eliminado, intente mas tarde", "warning");

              row.fadeIn();
            });

           }else {
             swal("Información!", "Hubo un problema, intente mas Tarde", "warning");

           }


         });

// ------ alert ------- //

          }else{
            $('.modal-footer #cancelModal').click();
            swal("Información!", "El Ingreso Seleccionado ya fue Cancelado", "warning");
            //  listar();
            $('#form-update section ul').hide().find('li').empty();
            $('#form-update section ul').find('li').remove();
         }
   }).fail(function(){
      $('.modal-footer #cancelModal').click();
      swal("Información!", "Hubo un problema", "warning");


    });

 });
//-----  Boton delete(elimina el campo);--------//
});
