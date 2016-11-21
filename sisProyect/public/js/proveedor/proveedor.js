function __(id) {
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

  var table = $('#myTable').DataTable({
  "destroy":true,
  "aLengthMenu": [[10,15,20 -1], [10,15,20, "Todo"]],

  "sPaginationType": "full_numbers",
  "oLanguage":  idioma_es
  /*"columnDefs":[
    {"render":function(data,type,row){
                return "S/."+data;
    },"targets":4},
    {"render":function(data,type,row){
                return "S/."+data;
    },"targets":5},
    {"render":function(data,type,row){
                return "S/."+data;
    },"targets":6}
  ]*/
  });
function listar() {
  $('#myTable').DataTable().draw();

}
  $(document).on("click","#myTable tbody tr",function(){
    var datos = table.row($(this)).data();
  //  var formdata = new FormData(datos);
  //  var connect = new XMLHttpRequest();
    window.location.href="proveedor/show/"+datos[0];
    /*connect.onreadystatechange=function(){
      if (connect.status == 200 && connect.readyState==4) {
          var data = JSON.parse(connect.responseText);
          if (data.success) {

          }else {



          }
      }else if (connect.readyState!=4) {

      }

    }
    connect.open("POST",url);
    connect.send(formdata);*/


  });

  function progress(key){


    if (key) {
      $("input").attr("disabled","disabled");
      $("select").attr("disabled","disabled");
      $("#btn-edit-proveedor").removeClass("btn-success");
      $("#btn-edit-proveedor").addClass("progress btn-default");
      $("#btn-edit-proveedor").css("background-color","white");
      $("#btn-edit-proveedor").attr("disabled","disabled");
      $("#return").css("margin-bottom","22px");
      $("#Nuevo").css("margin-bottom","22px");
    }else {
      $("input").removeAttr("disabled");
      $("select").removeAttr("disabled");
      $("#btn-edit-proveedor").addClass("btn-success");
      $("#btn-edit-proveedor").removeClass("progress btn-default");
      $("#btn-edit-proveedor").css("background-color","");
      $("#btn-edit-proveedor").removeAttr("disabled");
      $("#btn-edit-proveedor").css("margin-bottom","22px");

    }


  }
  $(document).on('keyup','input#Telefono, input#Documento',function(e){
    if (e.which != 37 && e.which != 39 && e.which != 8 && e.which != 46 ) {
      this.value = this.value.replace(/[^0-9]/g, '');

    }


  });
  $(document).on('click','.btn-edit-proveedor',function(e){

     var formdata = new FormData(document.forms.namedItem("form-edit"));
        var url = $("#form-edit").attr("action").replace(":PROVEEDOR_ID",$(this).data("id"));
        console.log(url);
        var connect = new XMLHttpRequest();
        connect.onreadystatechange = function(){
          if (connect.readyState==4 && connect.status == 200) {
            progress(false)
           var data = JSON.parse(connect.responseText);

         if (data.success) {
              //go
              console.log(data.success);
              swal("Genial!","Los datos fueron guardados con Exito!","success");
              window.location.href= "../../proveedor";

            }else {
              //errores
              console.log(data.error);
              $.each(data.error,function(index,error){
                  //recorre cada campo
                  $(".form-group").find("div."+index+"").addClass("has-error");
                  $(".form-group").find("div."+index+"").children("label."+index+"").html(error);

              });
            }
          }else if(connect.readyState!=4){
              //progress
              console.log("error: "+ connect.responseText);

              progress(true);

          }
        }
        connect.open("POST",url);
        connect.send(formdata);
  });

  $(document).on("click","#myTable .cls_option",function(e){
    e.stopPropagation();
  });
    $(document).on('click','.btn-delete-proveedor',function(){
        var row = $(this).parents("tr");
       var datos = table.row(row).data();

       var name = datos[2];
       swal({
          title: "¿Realmente quiere eliminar el Proveedor "+"''"+ name +"''"+ "?",
          text: "No podras recuperar al Proveedor ",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Si, quiero eliminarlo!",
          closeOnConfirm: false,
          html: false
        }, function(data){
          if (data) {
            var id = datos[0];
            var url = $('#form-delete').attr('action').replace(':PROVEEDOR_ID',id);
            var data =$('#form-delete').serialize();
            $.get(url,data,function(result){
              swal("Eliminado!",
              result.message,
              "success");
                  row.fadeOut();
                 listar();
           }).fail(function(result){
             swal("Información!", "El Proveedor no pudo ser eliminado, intente mas tarde", "warning");

             row.fadeIn();
           });

          }else {
          swal("Información!", "Hubo un problema, intente mas Tarde", "warning");

          }


        });



    });

});
