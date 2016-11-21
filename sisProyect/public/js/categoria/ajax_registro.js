function __(id){

    return document.getElementById(id);

}

$(document).ready(function(){

  function progress(display){
  $(".container .progress").css("display",display);

  }

$('#form-create').submit(function(e){
         e.preventDefault();

        var data = $('#form-create').serialize();
          //  alert($('#form-create').);
         var result;
        var url = $('#form-create').attr('action');
        $.ajax({
           url: url,
           method:'get',
           processData:false,
           contentType:false,
           cache:false,
           dataType:'json',
           data: data,
           success:function(data){
              progress("none")

          if (data.success)
          {
            $('#form-create .row').find(".form-group").children("div").removeClass('has-error');
            $('#form-create .row').find(".form-group").children("div").find("label").html("");

           swal("Genial!", "Registro Creado con Exito!", "success");
           $('#return').click();


           }else{
             $('#form-create .row').find(".form-group").children("div").removeClass('has-error');
             $('#form-create .row').find(".form-group").children("div").find("label").html("");

              $.each(data.error,function(index,error){
           //$("#form-create p[class="+index+"]").append(''+error+'');

           $('#form-create .row').find(".form-group").children("."+index+"").addClass('has-error');
           $('#form-create .row').find(".form-group").children("."+index+"").find("label").html(error);
              });

           //__('ajax_register').innerHTML = "";


           }

           },beforeSend:function(data){

             progress("block")
             //__('ajax_register').innerHTML=result;

           },error:function(data){
            alert("error");
           }
       }) ;

   });




});
