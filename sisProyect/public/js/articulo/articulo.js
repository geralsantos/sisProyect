function __(id){
        return document.getElementById(id);
}
//-----cambiar idioma a español del dattable -----//

//------Listar los datos obtenidos de la bd mysql-------//

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
    "order": [[ 0, "desc" ]],
    "processing": false,
    "serverSide": true,
    "ajax": "articulo/dataload",

    "columns":[
    //  {"data":"idarticulo"},

      {"data":"codigo"},
      {"data":"nombre"},
      {"data":"stock"},
      {"data":"stock_minimo"},
      {"data":"precio_venta"},
      {"data":"precio_compra"},
      {"defaultContent":"<span data-toggle='modal' data-target='#myModalEdit'  ><i class='fa fa-edit btn btn-warning btn-edit-articulo' data-toggle='tooltip' data-placement='top' title='' data-original-title='Editar'></i> </span> "+
                        "<i data-id='idarticulo' class='fa fa-trash btn btn-danger btn-delete-articulo' data-toggle='tooltip' data-placement='top' title='' data-original-title='Eliminar'></i><span></span>"+
                        " <span data-toggle='modal' data-target='#myModalShow'><i data-id='idarticulo' class='fa fa-list-alt btn btn-info btn-show' data-toggle='tooltip' data-placement='top' title='' data-original-title='Detalle'></i></span>"
      }
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
                              //console.log(row.stock);
                               return m;

                   },
                   "targets": 3
               } ,
    { "render": function ( data, type, row ) {

                              //console.log(row.stock);
                               return "S/."+data;

                   },"targets":4 },
    { "render": function ( data, type, row ) {

                              //console.log(row.stock);
                               return "S/."+data;

                   }, className: "cls_precio_compra","text-align":"center" ,"targets":5 }

  ]
  });
  //------Obtener datos de la bd mysql-------//

  //------Listar los datos obtenidos de la bd mysql-------//
  var listar = function(){
   //uso de la variable global y actualizandola//
    $('#myTable').DataTable().draw();

  };
  //--------------- Loading....------------------//
  function progress(display){
  $(".modal-content .progress").css("display",display);

  }
  //--------------- Loading....------------------//

  //-----  Boton editar(muestra los datos en los campos del modal);--------//

    $(document).on('click','#kvFileinputModal',function(){

      $("#myModalEdit").css("overflow","auto");

    });

      $(document).on('click','table .btn-edit-articulo',function(e){
       e.preventDefault();

       $(document).on('click','.kv-file-zoom',function(){
           $("#kvFileinputModal").children(".modal-dialog").children(".modal-content").css("width","95%");
           $(".modal-backdrop").removeClass();
        });

       var row = $(this).parents('tr');
       var id = table.row($(this).parents('tr')).data();
       var url = 'articulo/edit/'+id.idarticulo;
        //
        $.ajax({
           url: url,
           method:'get',
           processData:false,
           contentType:false,
           cache:false,
           dataType:'json',
           //data: data,
           success:function(data){
             progress("none");
             if(data.success){
               $('#form-update .modal-body .row').find(".form-group").children().removeClass('has-error');
               $('#form-update .modal-body .row').find(".form-group").children().find("label").html("");

                 __('Categoria').value = data.articulo.idcategoria;
                 __('Persona').value = data.articulo.idpersona;
                 __('Marca').value = data.articulo.idmarca;
                 __('Articulo').value = data.articulo.nombre;
                 __('Codigo').value = data.articulo.codigo;
                 __('Stock').value = data.articulo.stock;
                 __('Stock_min').value = data.articulo.stock_minimo;
                 __('Descripcion').value = data.articulo.descripcion;
                 __('Venta').value = data.articulo.precio_venta;
                 __('Compra').value = data.articulo.precio_compra;

                  if ( __("_i").value != data.articulo.idarticulo) {
                      filechange = true;
                      $(".kv-fileinput-error").html("");
                      $(".kv-fileinput-error").attr("style","display:none");
                      $(".kv-file-content").html("<img class='kv-preview-data file-preview-image' style='width:auto;height:160px;'>");
                      $(".file-upload-indicator").attr("title","No subido todavia").html("<i class='glyphicon glyphicon-hand-down text-warning'></i>");

                  }

                 $(".kv-preview-data").attr('src',('../images/'+data.articulo.imagen));
                  $(".kv-preview-data").attr('alt',('../images/'+data.articulo.imagen));
                  $(".kv-preview-data").attr('title',('../images/'+data.articulo.imagen));
                 $(".file-thumbnail-footer .file-footer-caption").attr('title',(data.articulo.imagen));
                 $(".file-thumbnail-footer .file-footer-caption").html(data.articulo.imagen);

                 $("#imagen").attr('value',data.articulo.imagen);
                 //valida algun evento del file si selecciono imagen o no

                 $('#file').change(function() {
                   //seleccionó una imagen
                   if ($(this).val()) {
                     __("_i").value = (data.articulo.idarticulo);

                   }else {

                   }
                  });

                $('.btn-update-articulo').attr('data-id',data.articulo.idarticulo);
                }else{
                  $('.modal-footer #cancelModal').click();
                  swal("Información!", "El Articulo ya fué Eliminado!", "warning");

                   row.fadeOut();
                  $('#form-update section ul').hide().find('li').empty();
                  $('#form-update section ul').find('li').remove();
               }

          },beforeSend:function(data){
            progress("block");

           },error:function(data){
             $('.modal-footer #cancelModal').click();
             swal("Información!", "Hubo un problema, Intente mas Tarde", "warning");

           }
       });
        //



       });
  //-----  Boton editar(muestra los datos en los campos del modal);--------//

   var filechange ;
   //validando la subida de archivos no autorizados :v
  $('#file').change(function() {
 //seleccionó una imagen
    if ($(this).val()) {
      var count = 0;
      var inter = setInterval(function(){
      var error = $(".kv-fileinput-error").html();
      if (count <= 1) {
          count++;
          }else{
              filechange =  error === "" ? true : false;

               clearInterval(inter);
           }

    },"500");
    }else {

    }

  });
  //-----  Boton update(actualiza los campos);--------//
  function update(){
    // el btn update tiene el atributo data-id
    //var form = $('#form-update');
    $form = $('#form-update');
    uploadImage($form);

      function uploadImage($form){
        var idcat = $('.btn-update-articulo').attr('data-id');
        var form = $('#form-update');
        var url = form.attr('action').replace(":ARTICLE_ID",idcat);

        var formdata = new FormData(document.forms.namedItem("form-update"));
        var connect = new XMLHttpRequest();



        connect.onreadystatechange = function(){

           if (connect.readyState==4 && connect.status==200) {
                progress("none");
              var Data = JSON.parse(connect.responseText);

              if (Data.success) {
                if (!filechange) {
                  swal("Información!", "Archivo no Permitido!, Seleccione un formato de Imagen", "warning");
                }else{
                  __("_i").value = "";
                $('#form-update .modal-body .row').find(".form-group").children().removeClass('has-error');
                $('#form-update .modal-body .row').find(".form-group").children().find("label").html("");


                     swal("Genial!", "Registro Actualizado con Exito!", "success");

                     listar();

                     $('.modal-footer #cancelModal').click();
                   }
               }else{

                 $('#form-update section ul').hide().find('li').empty();
                 $('#form-update section ul').find('li').remove();

                   $.each(Data.error,function(index,error){

                     $('#form-update .modal-body .row').find(".form-group").children("."+index+"").addClass('has-error');
                     $('#form-update .modal-body .row').find(".form-group").children("."+index+"").find("label").html(error);

                   });
                  //   $('#form-update section ul').slideDown();
               }


             }else if(connect.readyState!=4){
               progress("block");
             }

            }
      connect.open('post',url);
      connect.send(formdata);




  }

  }
  $(document).on('click','.modal-content .btn-update-articulo',function(e){

      update();
           e.preventDefault();
    });
  //-----  Boton update(actualiza los campos);--------//

  //-----  Boton delete(elimina el campo);--------//
  $(document).on('keypress', '#form-update',function(e){
    if (e.keyCode==13) {
      update();
e.preventDefault();
    }
  });
      $(document).on('click', 'table .btn-delete-articulo',function(e){
        // e.preventDefault();

         var row = $(this).parents('tr');
         var datos = table.row($(this).parents('tr')).data();

         var url2 = 'articulo/edit/'+datos.idarticulo;
        $.get(url2,function(data){
             if(data.success){
               var id = data.articulo.idarticulo;
               var name =data.articulo.nombre;

// ------ alert ------- //
              swal({
                 title: "¿Realmente quiere eliminar el articulo "+"''"+ name +"''"+ "?",
                 text: "No podras recuperar el Articulo",
                 type: "warning",
                 showCancelButton: true,
                 confirmButtonColor: "#DD6B55",
                 confirmButtonText: "Si, quiero eliminarlo!",
                 closeOnConfirm: false,
                 html: false
               }, function(data){
                 if (data) {
                   var url = $('#form-delete').attr('action').replace(':ARTICLE_ID',id);
                   var data =$('#form-delete').serialize();

                   $.post(url,data,function(result){
                     swal("Eliminado!",
                     result.message,
                     "success");
                         row.fadeOut();
                        listar();
                  }).fail(function(result){
                    swal("Información!", "El Articulo no pudo ser eliminado, intente mas tarde", "warning");

                    row.fadeIn();
                  });

                 }else {
                   swal("Información!", "Hubo un problema, intente mas Tarde", "warning");

                 }


               });

// ------ alert ------- //

                }else{
                  $('.modal-footer #cancelModal').click();
                  swal("Información!", "El Articulo ya fue Eliminado", "warning");


                   row.fadeOut();
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
