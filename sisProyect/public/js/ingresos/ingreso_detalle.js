function __(id){
        return document.getElementById(id);
}
//-----cambiar idioma a español del dattable -----//
$(document).ready(function(){
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
$('#myTable').DataTable({
  "destroy":true,
  "aLengthMenu": [[5,8,10 -1], [5,8,10, "Todo"]],

  "sPaginationType": "full_numbers",
  "oLanguage":  idioma_es,
  "columnDefs":[
    {"render":function(data,type,row){
                return "S/."+data;
    },"targets":4},
    {"render":function(data,type,row){
                return "S/."+data;
    },"targets":5},
    {"render":function(data,type,row){
                return "S/."+data;
    },"targets":6}
  ]
});


//-----cambiar idioma a español del dattable -----//

//------Obtener datos de la bd mysql-------//
//esta variable será bastante usada por eso es global
/*var table = $('#myTable').DataTable({
  "destroy":true,
  "oLanguage":  idioma_es,
    "aLengthMenu": [[10,25, 50, 100, 250, 500, -1], [10,25, 50, 100, 250, 500, "Todo"]],
  "sPaginationType": "full_numbers",

  "processing": false,
  "serverSide": true,
  "ajax": "detalle_ingresos/dataload",

  "columns":[

    {"data":"codigo"},
    {"data":"nombre"},
    {"data":"cantidad"},
    {"data":"precio_compra"},
    {"data":"precio_venta"}

  ] ,
 "columnDefs": [
  { className: "cls_codigo","width": "80px","text-align":"center", "targets": 0 },
  { className: "cls_nombre","width": "80px","text-align":"center", "targets": 1 },
  { className: "cls_cantidad","width": "250px","text-align":"center", "targets": 2 },
  { className: "cls_precio_compra","width": "80px","text-align":"center" ,"targets":3},
  { className: "cls_precio_venta","width": "80px","text-align":"center" ,"targets":4 }
  /*{"render": function ( data, type, row ) {
                           if (data == "Activo") {
                                var m = "<small style='font-size:0.9em' class='label bg-green'>"+data+"</small>";
                            }else if(data=="Cancelado"){
                              var m = "<small style='font-size:0.9em' class='label bg-red'>"+data+"</small>";

                            }
                            return m;

                 },
                 "targets": 5
             },
  //{ className: "cls_opcion","text-align":"center" ,"targets":6 }


]
});*/
//------Obtener datos de la bd mysql-------//

//------Listar los datos obtenidos de la bd mysql-------//
/*var listar = function(){
 //uso de la variable global y actualizandola//
 table = $('#myTable').DataTable({
   "destroy":true,
   "oLanguage":  idioma_es,
     "aLengthMenu": [[10,25, 50, 100, 250, 500, -1], [10,25, 50, 100, 250, 500, "Todo"]],
   "sPaginationType": "full_numbers",
   "processing": false,
   "serverSide": true,
   "ajax": "detalle_ingresos/dataload",
   "columns":[
     {"data":"codigo"},
     {"data":"nombre"},
     {"data":"cantidad"},
     {"data":"precio_compra"},
     {"data":"precio_venta"}
   ] ,
 "columnDefs": [
   { className: "cls_codigo","width": "80px","text-align":"center", "targets": 0 },
   { className: "cls_nombre","width": "80px","text-align":"center", "targets": 1 },
   { className: "cls_cantidad","width": "250px","text-align":"center", "targets": 2 },
   { className: "cls_precio_compra","width": "80px","text-align":"center" ,"targets":3},
   { className: "cls_precio_venta","width": "80px","text-align":"center" ,"targets":4 }
 ]
});
}*/
});
