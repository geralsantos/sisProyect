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
  "ajax": "categoria/dataload",

  "columns":[
    {"data":"idcategoria"},
    {"data":"nombre_categoria"},
    {"data":"descripcion"},
    {"defaultContent":"<span data-toggle='modal' data-target='#myModalEdit'  ><i class='fa fa-edit btn btn-warning btn-edit' data-toggle='tooltip' data-placement='top' title='' data-original-title='Editar'></i> </span> "+
                      "<i data-id='idcategoria' class='fa fa-trash btn btn-danger btn-delete' data-toggle='tooltip' data-placement='top' title='' data-original-title='Eliminar'></i><span></span>"
                     }
     ],
  "columnDefs": [
    { "width": "100px","text-align":"center", "targets": 0 },
    { "width": "20%","text-align":"center", "targets": 0 },
    { "width": "20%","text-align":"center" ,"targets": 0 },
    { "width": "100%","text-align":"center", "targets": 0 }

  ]


});
//------Obtener datos de la bd mysql-------//

//------Listar los datos obtenidos de la bd mysql-------//
var listar = function(){
 //uso de la variable global y actualizandola//
 table = $('#myTable').DataTable({

    "destroy":true,
    "oLanguage":  idioma_es,
    "sPaginationType": "full_numbers",

    "processing": false,
    "serverSide": true,
    "ajax": "categoria/dataload",

    "columns":[
      {"data":"idcategoria"},
      {"data":"nombre_categoria"},
      {"data":"descripcion"},
      {"defaultContent":"<span data-toggle='modal' data-target='#myModalEdit'  ><i class='fa fa-edit btn btn-warning btn-edit' data-toggle='tooltip' data-placement='top' title='' data-original-title='Editar'></i> </span> "+
                        "<i data-id='idcategoria' class='fa fa-trash btn btn-danger btn-delete' data-toggle='tooltip' data-placement='top' title='' data-original-title='Eliminar'></i><span></span>"
                       }
        ],
     "columnDefs": [
       { "width": "100px","text-align":"center", "targets": 0 },
       { "width": "20%","text-align":"center", "targets": 0 },
       { "width": "20%","text-align":"center" ,"targets": 0 },
       { "width": "100%","text-align":"center", "targets": 0 }

     ]


  });


 };
//------Listar los datos obtenidos de la bd mysql-------//

$(document).ready(function(e){
  function progress(display){
  $(".modal-content .progress").css("display",display);

  }


  //-----  Boton editar(muestra los datos en los campos del modal);--------//
      $(document).on('click','table .btn-edit',function(e){
       e.preventDefault();

       //var row = $(this).parents('tr');
       var id = table.row( $(this).parents('tr') ).data();
        $("#form-update").attr('action',window.location+'/'+id.idcategoria) ;

       var url = 'categoria/edit/'+id.idcategoria;

        console.log(url);
        $.ajax({
            url:url,
            method:'get',
            processData:false,
            contentType:false,
            cache:false,
            dataType:'json',
            success:function(data){
                progress("none");
              if(data.success){
                $('#form-update .modal-body .row').find(".form-group").children().removeClass('has-error');
                $('#form-update .modal-body .row').find(".form-group").children().find("label").html("");

                  __('Categoria').value = data.categoria.nombre;
                  __('Descripcion').value = data.categoria.descripcion;
                  console.log(data.categoria.idcategoria);
                  $('.btn-update').attr('data-id',data.categoria.idcategoria);
                 }else{
                   $('.modal-footer #cancelModal').click();
                   alert('Error! Categoria fue eliminada');
                   //row.fadeOut();
                   $('#form-update section ul').hide().find('li').empty();
                   $('#form-update section ul').find('li').remove();
                }
            },beforeSend:function(){
                progress("block");
            },error:function(){
              $('.modal-footer #cancelModal').click();
              alert('Error categoria');
            }
        });


       });
  //-----  Boton editar(muestra los datos en los campos del modal);--------//

  //-----  Boton update(actualiza los campos);--------//


function update(){

          var form = $('#form-update');

          var url = form.attr('action');

          var formdata = new FormData(document.forms.namedItem("form-update"));
          var connect = new XMLHttpRequest();
           connect.onreadystatechange = function(){

             if (connect.readyState==4 && connect.status==200) {
                  progress("none");
                var Data = JSON.parse(connect.responseText);

                if(Data.success){

                  $('#form-update .modal-body .row').find(".form-group").children().removeClass('has-error');
                  $('#form-update .modal-body .row').find(".form-group").children().find("label").html("");

                     swal("Genial!", "Registro Actualizado con Exito!", "success");

                     listar();
                     $('.modal-footer #cancelModal').click();
                   }else{

                     $('#form-update .modal-body .row').find(".form-group").children().removeClass('has-error');
                     $('#form-update .modal-body .row').find(".form-group").children().find("label").html("");

                    $.each(Data.error,function(index,error){
                      $('#form-update .modal-body .row').find(".form-group").children("."+index+"").addClass('has-error');
                      $('#form-update .modal-body .row').find(".form-group").children("."+index+"").find("label").html(error);

                    });

                   }

               }else if(connect.readyState!=4){
                 progress("block");
               }

              }

        connect.open('post',url);
        connect.send(formdata);
}
  $(document).on('click','.btn-update',function(e){
    // el btn update tiene el atributo data-id //
     update();
       e.preventDefault();

    });
    $(document).on('keypress','#form-update',function(e){
      if (e.keyCode==13) {
        update();
  e.preventDefault();
      }

    });


  //-----  Boton update(actualiza los campos);--------//

  //-----  Boton delete(elimina el campo);--------//
      $(document).on('click', 'table .btn-delete',function(e){
        // e.preventDefault();

         var row = $(this).parents('tr');
         var datos = table.row($(this).parents('tr')).data();
         var url2 = 'categoria/edit/'+datos.idcategoria;
        $.get(url2,function(data){
             if(data.success){
               var id = data.categoria.idcategoria;
               var name =data.categoria.nombre;

// ------ alert ------- //
              swal({
                 title: "¿Realmente quiere eliminar la categoria "+"''"+ name +"''"+ "?",
                 text: "No podras recuperar la categoria",
                 type: "warning",
                 showCancelButton: true,
                 confirmButtonColor: "#DD6B55",
                 confirmButtonText: "Si, quiero eliminarlo!",
                 closeOnConfirm: false,
                 html: false
               }, function(data){
                 if (data) {
                   var url = $('#form-delete').attr('action').replace(':USER_ID',id);
                   var data =$('#form-delete').serialize();
                   $.post(url,data,function(result){
                     swal("Eliminado!",
                     result.message,
                     "success");
                         row.fadeOut();
                        listar();
                  }).fail(function(result){
                    alert('La categoria no fue eliminada!');
                    row.fadeIn();
                  });

                 }else {
                 }


               });

// ------ alert ------- //

                }else{
                  $('.modal-footer #cancelModal').click();
                  swal("Error!", "Categoria fue eliminada!", "warning");

                //  alert('Error! Categoria fue eliminada');
                   row.fadeOut();
                  $('#form-update section ul').hide().find('li').empty();
                  $('#form-update section ul').find('li').remove();
               }
         }).fail(function(){
            $('.modal-footer #cancelModal').click();
            alert('Error categoria');
          });

       });
  //-----  Boton delete(elimina el campo);--------//


     var xhr;
     var paging ="1";
     var control=0;
    /*
    $(document).on('keyup','#searchText',function(e){
       if (xhr && xhr.readyState!=4){xhr.abort();}
          var texto =  __('searchText').value;
            var page =$(".pagination li[class='active']").children('span').text();
          var data = $('#form-search').serialize();
          var url =$('#form-search').attr('action') ;

         var output="";

         if(texto.trim()==""){
         __('searchText').value = "";

          if (__('searchText').value !="" || texto.length == 0 ){

          xhr = $.get('categoria/dataload?page='+paging,data,function(data){

                 control=0;
           __('tbody').innerHTML = data;
        }).fail(function(){
            alert("dd");
        });
          }
        }else{

         xhr = $.get('categoria/dataload?page='+1,data,function(data){
             control++;

                 if(data){
                      if(paging){
                          if(control<=1){

                            if(paging!=page){

                               if(page!=""){paging = page; }

                            }else{
                                if(page!=""){paging = page;  }
                            }

                           }
                      }

               __('tbody').innerHTML = data;


                 }

           }).fail(function(){
            console.log(xhr['abort']);
            });
     }
      e.preventDefault();
   });

    $(document).on("click",".pagination li a",function(e){
        e.preventDefault();
        var href = $(this).attr('href');
        var page = href.split('?page=')[1];
        var url = 'categoria/dataload?page='+page;
         var texto =  __('searchText').value;
        var data = $('#form-search').serialize();
        if(texto!=""){


        $.get(url,data,function(data){

        __('tbody').innerHTML=data;

            location.hash= page;
        });
             }else{
              $.get(url,function(data){

        __('tbody').innerHTML=data;

            location.hash= page;
        });
             }
    });
*/
});
