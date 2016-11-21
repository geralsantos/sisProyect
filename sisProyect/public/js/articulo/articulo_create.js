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
  var tableProveedor = $('#myTableProveedor').DataTable({
   "destroy":true,
   "oLanguage":  idioma_es,
     "aLengthMenu": [[5,10,15, 20, 25, 50, -1], [5,10,15, 20, 25, 50, "Todo"]],
   "sPaginationType": "full_numbers",

   "processing": false,
   "serverSide": false


  });
  function progress(display){
  $(".container .progress").css("display",display);

  }
  $("input[type='number']").keypress(function (tecla) {
    if (tecla.which != 37 && tecla.which != 39 && tecla.which != 8 && tecla.which != 46 ) {

            if ((tecla.charCode < 48 || tecla.charCode > 57) && (tecla.charCode != 46) && (tecla.charCode != 8)) {
                return false;
            }else{
                     var len   = $(this).val().length;
                     var index = $(this).val().indexOf('.');
                     if (index > 0 && tecla.charCode == 46) {
                         return false;
                     }
                     if (index > 0) {
                         var CharAfterdot = (len + 1) - index;
                         if (CharAfterdot > 3) {
                             return false;
                         }
                     }
            }
              return true;
            }

        });
  /*$(document).on("mouseup keyup","input[type='number']",function(){
    this.value = this.value.replace(/[^0-9]/g, '0');

  });*/

  $(document).on('click','#myModalProveedorList .modal-table table tbody tr',function(){
  var datos =  tableProveedor.row($(this)).data();
  __("Persona").value = datos[0];

  $("#myModalProveedorList #cancelModal").click();
  });

  //-----  Boton create(actualiza los campos);--------//
  $(document).on('click','#form-create #btn-create-articulo',function(e){
    // el btn create tiene el atributo data-id
    //var form = $('#form-create');
    $form = $('#form-create');
    uploadImage($form);

      function uploadImage($form){
        var form = $('#form-create');
        var url = form.attr('action');

        var formdata = new FormData(document.forms.namedItem("form-create"));
        var connect = new XMLHttpRequest();

        connect.onreadystatechange = function(){
            progress("none");
           if (connect.readyState==4 && connect.status==200) {

              var Data = JSON.parse(connect.responseText);
              if (Data.success) {
                var error = $(".kv-fileinput-error").html();
                if (error) {

                  swal("Información!", "Archivo no Permitido!, Seleccione un formato de Imagen", "warning");

                }else{
                $('#form-create .row').find(".form-group").children("div").children("div").removeClass('has-error');
                $('#form-create .row').find(".form-group").children("div").children("div").find("label").html("");

                     swal("Genial!", "Registro Creado con Exito!", "success");

                    window.location.href=($("#return").attr("href"));
                     //$('#return').click();
                    }
                }else{

                 $('#form-create .row').find(".form-group").children("div").children("div").removeClass('has-error');
                 $('#form-create .row').find(".form-group").children("div").children("div").find("label").html("");

                   $.each(Data.error,function(index,error){
                     $('#form-create .row').find(".form-group").children("div").children("."+index+"").addClass('has-error');
                     $('#form-create .row').find(".form-group").children("div").children("."+index+"").find("label").html(error);

                 });

                }


             }else if(connect.readyState!=4){
                progress("block")
             }

            }
            connect.open('post',url);
            connect.send(formdata);




  }

           e.preventDefault();
    });
  //-----  Boton create(actualiza los campos);--------//




});
