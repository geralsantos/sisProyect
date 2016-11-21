function __(id){
        return document.getElementById(id);
}
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
    "ajax": "create/articulo/dataload",
    "columns":[
      {"data":"codigo"},
      {"data":"nombre"},
      {"data":"stock"},
      {"data":"stock_minimo"},
      {"data":"precio_venta"},
      {"data":"precio_compra"},
      {"data":"nombre_marca"},
      {"data":"nombre_categoria"}
    ] ,
  "columnDefs": [
    { className: "cls_codigo", "width": "80px","text-align":"center", "targets": 0 },
    { className: "cls_nombre","width": "150px","text-align":"center", "targets": 1 },
    { className: "cls_stock","width": "80px","text-align":"center" ,"targets":2 },
    {"render": function ( data, type, row ) {
                            if(data >= row.stock){
                                var m = "<small style='font-size:0.9em' class='label bg-red'>"+data+"</small>";
                              }else{
                                var m = "<small style='font-size:0.9em' class='label bg-green'>"+data+"</small>";
                              }
                               return m;
                   },"width":"150px;","targets": 3},
    { className: "cls_precio_venta","text-align":"center" ,"targets":4 },
    { className: "cls_precio_compra","text-align":"center" ,"targets":5 },
    { className: "cls_marca","text-align":"center" ,"targets":6 },
    { className: "cls_categoria","text-align":"center" ,"targets":7 }
  ]
  });
  //------Obtener datos de la bd mysql-------//


  //------Listar los datos obtenidos de la bd mysql-------//
  var listar = function(){
   //uso de la variable global y actualizandola//
   table;

  };
  var table2 = $('#myTable2').DataTable({
   "destroy":true,
   "oLanguage":  idioma_es,
     "aLengthMenu": [[5,10,15, 20, 25, 50, -1], [5,10,15, 20, 25, 50, "Todo"]],
   "sPaginationType": "full_numbers",

   "processing": false,
   "serverSide": false,
   "columns":[
     {"data":"eliminar"},
     {"data":"numeral"},
     {"data":"codigo"},
     {"data":"articulo"},
     {"data":"cantidad"},
     {"data":"compra"},
     {"data":"venta"},
     {"data":"subtotal"},
   ],
   "columnDefs":[
     {className:"cls_delete","targets":0}




   ]


  });
  var tableProveedor = $('#myTableProveedor').DataTable({
   "destroy":true,
   "oLanguage":  idioma_es,
     "aLengthMenu": [[5,10,15, 20, 25, 50, -1], [5,10,15, 20, 25, 50, "Todo"]],
   "sPaginationType": "full_numbers",

   "processing": false,
   "serverSide": false


  });
  var count = 0;
  var boot= setInterval(function fromProveedor_toIngreso_boot() {
    if (count<=1) {
      count++;
    }else {
  var datos =  tableProveedor.rows().data();

  var get = $("button.dropdown-toggle").children("span:first").html();
  //console.log(get);
  $.map(datos,function(val){
      if (get == val[2]) {
        __("Tipo").value= val[1];
        __("Nombre").value= val[2];
        $("#Provider").children(".Doc").find("#Tipo").html(val[3]);
        __("Numero_documento").value= val[4];
        __("Direccion").value= val[5];

        $("#Provider").attr("Style","display:block");
      }


  });
  clearInterval(boot);
  }
},400);


  function progress(display){
  $(".container .progress").css("display",display);

  }

  $(document).on('click','#form-create .btn-aceptar-ingreso',function(e){
     e.preventDefault();

    var url = $(this).parents("#form-create").attr("action");
    var data = $("#form-create").serialize();

           $.ajax({
                url:url,
                data:data,
                processData:false,
                contentType:false,
                cache:false,
                dataType:'json',
                success:function(data){
                    progress("none");
                    if (data.success) {
                      //console.log(data);
                       $("#form-create").find(".form-group").children("div").children("div").removeClass("has-error");
                      $("#form-create").find(".form-group").children("div").children("div").find("label").html("");
                      $(".container .panel .table-responsive .error-articulo").html("");
                      swal("Genial!","El ingreso ha sido generado!","success");
                      window.location.href="/compras/ingresos";
                    }else {

                      $("#form-create").find(".form-group").children("div").children("div").removeClass("has-error");
                      $("#form-create").find(".form-group").children("div").children("div").find("label").html("");

                       var error_articulo="";
                       var errors ="";
                        $.each(data.error,function(index,error){
                        // console.log(index+": "+error);
                           var split_index = index.split(".")[0];
                          /* var split_error = $.map(error,function(val){ return val.split(".0"); });
                            var error_finished = split_error[0]+""+split_error[1];*/
                           //console.log(split_error);
                         if (split_index=="cantidad" || split_index=="precio_compra" ||split_index=="precio_venta") {
                           errors += "<ul><li>"+error+".</li></ul>";
                           error_articulo ="<div class='alert alert-dismissible alert-danger'>"+
                           "<button type='button' class='close' data-dismiss='alert'>&times;</button>"+
                           "<strong>Information!</strong> <a href='#'> "+
                           "Es necesario corregir los errores</a>"+errors+
                           "</div>";

                         }
                        $("#form-create").find(".form-group").children("div").children("."+index+"").addClass("has-error");
                        $("#form-create").find(".form-group").children("div").children("."+index+"").find("label").html(error);

                      });
                      $(".container .panel .table-responsive .error-articulo").html(error_articulo);


                     }

                },beforeSend:function(data){
                    progress("block");
                },error:function(data){
                  console.log(data);
                }
           });


  });

  var cont = 1;
  var array=[];
  $(document).on('click','.table-index table tbody .cls_delete i',function(e){
      e.stopPropagation();
      // console.log("array sin eliminar :"+array);
      var delete_var = $(this).attr("data-id");
          array = $.grep(array,function(value){

             return value != delete_var;
           });
      var t = table2.row($(this).parents("tr")).remove().draw() ? true:false;
      //console.log("array despues de eliminar :"+array);
  });

  $(document).on("mouseup keyup",'#myTable2 input',function(e){
    if (__("cantidad").value <= 0) {
        __("cantidad").value=0;
    }
    if (__("precio_compra").value<=0) {
        __("precio_compra").value =0;
    }
    if (__("precio_venta").value<=0) {
        __("precio_venta").value =0;
    }


    var cantidad = parseInt($(this).parents("tr").find("#cantidad").val());
    this.value = this.value.replace(/[^0-9]/g, '0');
    var precio_compra = parseInt($(this).parents("tr").find("#precio_compra").val());

    var subtotal= parseInt($(this).parents("tr").find("#subtotal").val(cantidad * parseInt(precio_compra)));
    $(this).parents("tr").find(".subtotal").html("S/. "+(cantidad * parseInt(precio_compra)) );

  });

  //********Elegir Proveedor START****//
  $(document).on('click',"ul.dropdown-menu li",function(){
    var datos =  tableProveedor.rows().data();
    var get = $("button.dropdown-toggle").attr("title");


    if (get === "Seleccione Proveedor") {
      __("Tipo").value= "";
      __("Nombre").value= "";
      $("#Provider").children(".Doc").find("#Tipo").html("Documento");
      __("Numero_documento").value= "";
      __("Direccion").value= "";
      $("#Provider").attr("Style","display:none");
    }

   $.map(datos,function(val){

         if (val.indexOf(get) != -1) {
          __("Tipo").value= val[1];
          __("Nombre").value= val[2];
          $("#Provider").children(".Doc").find("#Tipo").html(val[3]);
          __("Numero_documento").value= val[4];
          __("Direccion").value= val[5];

          $("#Provider").attr("Style","display:block");

        }



    });

  });
  //tabla modal de proveedores//
  $(document).on('click','#myModalProveedorList .modal-table table tbody tr',function(){
  var datos =  tableProveedor.row($(this)).data();
  __("Persona").value = datos[0];
  var a = $("#form-create").find(".form-group").children("div").children(".Persona").children("div").children("div").find("button")
  .attr("title",datos[2]).children("span:first").html(datos[2]);
   __("Tipo").value= datos[1];

  __("Nombre").value = datos[2];
  $("#Provider").children(".Doc").find("#Tipo").html(datos[3]);
  __("Numero_documento").value= datos[4];
  __("Direccion").value= datos[5];

  $("#Provider").attr("Style","display:block");
  $("#myModalProveedorList #cancelModal").click();
  });
  //tabla modal de proveedores//

  //********Elegir Proveedor END****//
  $(document).on('click','#myModalArticulo .modal-table table tbody tr',function(){
          var restriccion=0;
          var table_data = table.row(this).data();

          var table_data2 = table2.row().data();

            $.map(array,function(value,i){
                if (value === table_data.idarticulo) {
                    restriccion = 1;
                }
            });

            array.push(table_data.idarticulo);

              if (restriccion == 1) {
                 $("#myTable2 i").map(function(){
                    var contador_cantidad =parseInt($(this).parents("tr").find("#cantidad").val());
                    var precio_compra =parseInt($(this).parents("tr").find("#precio_compra").val());
                    var id = $(this).attr("data-id");

                     if (id == table_data.idarticulo) {
                          var cantidad = parseInt($(this).parents("tr").find("#cantidad").val(contador_cantidad+1));
                          var precio_compra = parseInt($(this).parents("tr").find("#precio_compra").val());
                          var new_cantidad = parseInt($(this).parents("tr").find("#cantidad").val());
                          var subtotal= parseInt($(this).parents("tr").find("#subtotal").val(new_cantidad * parseInt(precio_compra)));
                          $(this).parents("tr").find(".subtotal").html("S/."+(new_cantidad * parseInt(precio_compra)));
                     }

                 });

              }else {

                table2.row.add({
                  "eliminar": " <input type='hidden' name='idarticulo[]' id='idarticulo' value='"+table_data.idarticulo+"'>  <i data-id='"+table_data.idarticulo+"' class='fa fa-trash btn btn-danger btn-delete-articulo' data-toggle='tooltip' data-placement='top' title='' data-original-title='Eliminar'></i><span></span>",
                  "numeral":       cont++,
                  "codigo":       "<input type='hidden' name='codigo[]' id='codigo' value='"+table_data.codigo+"'>"+table_data.codigo,
                  "articulo":     "<input type='hidden' name='nombre[]' id='nombre' value='"+table_data.nombre+"'>"+table_data.nombre,
                  "cantidad":     "S/. <input type='number' min='0' style='width:60px;text-align:center' name='cantidad[]' id='cantidad' value='1'>",
                  "compra":       "S/. <input type='number'  min='0' style='width:60px;text-align:center' name='precio_compra[]' id='precio_compra' value='"+table_data.precio_compra+"'>",
                  "venta":        "S/. <input type='number'  min='0' style='width:60px;text-align:center' name='precio_venta[]' id='precio_venta' value='"+table_data.precio_venta+"'>",
                  "subtotal":     "<input type='hidden' name='subtotal[]' id='subtotal' value='"+table_data.precio_compra+"'><p class='subtotal'>S/. "+table_data.precio_compra+"</p>"
                }).draw();

              }
  });


});
