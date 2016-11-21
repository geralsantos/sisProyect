@extends('layouts.admin')
@section('scripts')
<script type="text/javascript" src="{{asset('js/proveedor/create.js')}}">

</script>
@endsection

@section('contenido')

<div class="container">

  <div class="row">
    {!!Form::open(['route'=>['compras.proveedor.store'],'method'=>'POST','id'=>'form-create','role'=>'CREATE','autocomplete'=>'off']) !!}

              <div class="form-group col-sm-6 col-md-5 col-xs-12">
                <div class="col-sm-12">
                  <label for="Tipo_documento" class="col-xs-12 col-form-label">Tipo Proveedor</label>
                  <div class="col-md-11 col-sm-11 col-xs-12 Tipo_Proveedor">

                      <select class="form-control" name="Tipo_Proveedor" id="Tipo_Proveedor">
                          <option value="">Seleccione Tipo de Proveedor</option>
                          <option value="Bienes">Proveedor de Bienes</option>
                          <option value="Servicios">Proveedor de Servicios</option>
                          <option value="Recursos">Proveedor de Recursos</option>
                      </select>
                      <label class="control-label Tipo_Proveedor"></label>
                  </div>
                </div>
              </div>
              <div class="form-group col-sm-6 col-md-5 col-xs-12">
                <div class="col-sm-12">
                   <label for="Nombre" class="col-xs-12 col-form-label"><p>Nombres y Apellidos</p></label>
                       <div class="col-md-11 col-sm-11 col-xs-12 Nombre">
                         <div class="input-group">
                            <span class="input-group-addon fa fa-user-o"></span>
                            <input type="text" class="form-control" name="Nombre" id="Nombre" placeholder="Ej: Poma Santos, Geral Mariano" value="">
                         </div>
                             <label class="control-label Nombre"></label>
                      </div>
                </div>
              </div>

              <div class="form-group col-sm-6 col-md-5 col-xs-12">
                <div class="col-sm-12">
                  <label for="Direccion" class="col-xs-8 col-form-label"><p>Direccion</p> </label>
                  <div class="col-md-11 col-sm-11 col-xs-12  Direccion">
                      <div class="input-group">
                        <span class="input-group-addon fa fa-map-o"></span>
                          <input type="text" name="Direccion" class="form-control" id="Direccion" placeholder="Ej: Distrito de Lima, Perú" value="">
                      </div>
                      <label class="control-label Direccion"></label>
                  </div>
                </div>
              </div>
              <div class="form-group col-sm-6 col-md-5 col-xs-12">
                <div class="col-sm-12">
                  <label for="Documento" class="col-xs-8 col-form-label"><p>Documento</p> </label>
                  <div class="col-md-11 col-sm-11 col-xs-12 Documento">
                     <div class="input-group">
                      <span class="input-group-addon fa fa-id-card-o"></span>
                      <input type="text" class="form-control" name="Documento" maxlength="8" placeholder="Ej: 76521148" id="Documento" value="">
                    </div>
                    <label class="control-label Documento"></label>
                  </div>
                </div>
              </div>
              <div class="form-group col-sm-6 col-md-5 col-xs-12">
                <div class="col-sm-12">
                  <label for="Telefono" class="col-xs-8 col-form-label"><p>Telefono</p></label>
                  <div class="col-sm-11 col-md-11 col-xs-12 Telefono">
                    <div class="input-group">
                      <span class="input-group-addon fa fa-phone"></span>
                      <input type="text" name="Telefono" id="Telefono" class="form-control" maxlength="9" placeholder="Ej: 123456789" value="">

                    </div>
                    <label class="control-label Telefono"></label>
                  </div>
                </div>
              </div>
              <div class="form-group col-sm-6 col-md-5 col-xs-12">
                <div class="col-sm-12">
                  <label for="Email" class="col-xs-8 col-form-label"><p>Email</p></label>
                  <div class="col-sm-11 col-md-11 col-xs-12 Email">
                    <div class="input-group">
                       <span class="input-group-addon fa fa-at"></span>
                       <input type="text" name="Email" id="Email" class="form-control" placeholder="Ej: usuario@dominio.com" value="">
                    </div>
                    <label class="control-label Email"></label>
                  </div>
                </div>
              </div>
              <div class="form-group col-sm-6 col-md-5 col-xs-12">
               <div class="col-sm-12">
                  <div class="col-sm-12">
                 <button type="button" id="Nuevo" name="Nuevo" style="width:100px;height:34px;" class="btn btn-success btn-create-proveedor">Aceptar</button>
                 <a href="{{url('compras/proveedor')}}" id="return" name="return" class="btn btn-default">Volver al Listado
                 </a>
                  </div>
             </div>

           </div>
           {!!Form::close()!!}

          </div>

   <style>
    .progress{

      background: rgba(255, 255, 255, .5) url("{{asset('img/progress.gif')}}") no-repeat 50%;
      background-size: 50px 50px;

    }
  </style>
<input type="hidden" name="key" id="key" value="{{$key}}">
</div>



@endsection
