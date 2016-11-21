function __(id) {
  return document.getElementById(id);
}
$(document).ready(function(){
  function progress(key){
    if (key) {
      $("input").attr("disabled","disabled");
      $("select").attr("disabled","disabled");
      $("#Nuevo").removeClass("btn-success");
      $("#Nuevo").addClass("progress");
      $("#Nuevo").css("background-color","white");
      $("#Nuevo").attr("disabled","disabled");
     }else {
       $("input").removeAttr("disabled");
       $("select").removeAttr("disabled");
      $("#Nuevo").addClass("btn-success");
      $("#Nuevo").removeClass("progress btn-default");
      $("#Nuevo").css("background-color","");
      $("#Nuevo").removeAttr("disabled");

    }


  }

  $(document).on('keyup','input#Telefono, input#Documento',function(e){
    if (e.which != 37 && e.which != 39 && e.which != 8 && e.which != 46 ) {
      this.value = this.value.replace(/[^0-9]/g, '');

    }

  });
  $(document).on('click','.btn-create-proveedor',function(){


        var formdata = new FormData(document.forms.namedItem("form-create"));
        var connect = new XMLHttpRequest();
        var url = $("#form-create").attr("action");

      connect.onreadystatechange = function(){
          if (connect.readyState == 4 && connect.status==200) {
            //progress end
              progress(false);
            var response = JSON.parse(connect.responseText);
            $('.form-group').children("div").children("div").removeClass("has-error");
            $('.form-group').children("div").children("div").find("label").html("");
             if (response.success) {
                //go guardar
                swal("Genial!","Los datos fueron guardados con Exito!","success");
                if (__("key").value == "return_to_articulo") {
                  
                  return window.location.href="../../../articulo/create";
                }else if (__("key").value == "return_to_ingreso") {

                return window.location.href="../../../ingresos/create";

              }else {
                window.location.href= "proveedor/..";
              }
                //window.location.href= "proveedor/..";
              }else {
                //errores
                console.log(response.error);
                $('.form-group').children("div").children("div").removeClass("has-error");
                $('.form-group').children("div").children("div").find("label").html("");

                $.each(response.error,function(index,error){
                  console.log(error);
                    $('.form-group').children("div").children("."+index+"").addClass("has-error");
                    $('.form-group').children("div").children("."+index+"").find("label."+index+"").html(error);
                });
              }
          }else if (connect.readyState!=4) {
              //progress boot
                progress(true);
          }
        }
        connect.open("POST",url);
        connect.send(formdata);


  });
});
