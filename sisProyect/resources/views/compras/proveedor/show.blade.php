@extends('layouts.admin')


@section('contenido')
<div class="container" style="position: relative;">

  {!!Form::open(['route'=>['compras.proveedor.update',':PROVEEDOR_ID'],'method'=>'UPDATE','id'=>'form-edit','role'=>'EDIT','autocomplete'=>'off']) !!}
  <style>
    .progress{
      background: rgba(255, 255, 255, .5) url("{{asset('img/progress.gif')}}") no-repeat 50%;
      background-size: 50px 50px;
    }
  </style>

  <div class="row">
    <div class="form-group col-sm-12 col-xs-12">
      <div class="col-sm-5">
        <label for="Tipo_documento" class="col-xs-12 col-form-label"><p>Tipo Proveedor</p></label>
        <div class="col-md-11 col-sm-11 col-xs-12 Tipo_Proveedor">
            <select class="form-control" name="Tipo_Proveedor" id="Tipo_Proveedor">
              <option value="">Seleccione Tipo de Proveedor</option>
                <option value="Bienes" @if ($proveedor->tipo_persona=='Bienes') selected='true' @endif >Proveedor de Bienes</option>
                <option value="Servicios" @if ($proveedor->tipo_persona=='Servicios') selected='true' @endif   >Proveedor de Servicios</option>
                <option value="Recursos" @if ($proveedor->tipo_persona=='Recursos') selected='true' @endif >Proveedor de Recursos</option>
              </select>
            <label class="control-label Tipo_Proveedor"></label>
        </div>
      </div>

                <div class="col-sm-5">
                   <label for="Nombres" class="col-xs-12 col-form-label"><p>Nombres y Apellidos</p></label>
                       <div class="col-md-11 col-sm-11 col-xs-12 Nombre">
                         <div class="input-group">
                            <span class="input-group-addon fa fa-user-o"></span>
                            <input type="text" class="form-control" name="Nombre" id="Nombres" placeholder="Ej: Poma Santos, Geral Mariano"
                            value="{{$proveedor->nombre}}">

                         </div>
                             <label class="control-label Nombres"></label>
                      </div>
                </div>
              </div>

              <div class="form-group col-sm-12 col-xs-12">
                <div class="col-sm-5">
                  <label for="Documento" class="col-xs-8 col-form-label"><p>{{$proveedor->tipo_documento}}</p> </label>
                  <div class="col-md-11 col-sm-11 col-xs-12 Documento">
                     <div class="input-group">
                      <span class="input-group-addon fa fa-id-card-o"></span>
                      <input type="text" class="form-control" name="Documento" maxlength="8" placeholder="Ej: 76521148" id="Documento" value="{{$proveedor->num_documento}}">
                      </div>
                      <label class="control-label Documento"></label>
                  </div>
                </div>

                <div class="col-sm-5">
                  <label for="Direccion" class="col-xs-8 col-form-label"><p>Direccion</p> </label>
                  <div class="col-md-11 col-sm-11 col-xs-12  Direccion">
                      <div class="input-group">
                        <span class="input-group-addon fa fa-map-o"></span>
                          <input type="text" name="Direccion" class="form-control" id="Direccion" placeholder="Ej: Distrito de Lima, Perú" value="{{$proveedor->direccion}}">
                        </div>
                        <label class="control-label Direccion"></label>
                    </div>
                  </div>
                </div>

              <div class="form-group col-sm-12 col-xs-12">
                <div class="col-sm-5">
                  <label for="Telefono" class="col-xs-8 col-form-label"><p>Telefono</p></label>
                  <div class="col-sm-11 col-md-11 col-xs-12 Telefono">
                    <div class="input-group">
                      <span class="input-group-addon fa fa-phone"></span>
                      <input type="text" name="Telefono" id="Telefono" maxlength="9" class="form-control" placeholder="Ej: 123456789" value="{{$proveedor->telefono}}">
                    </div>
                    <label class="control-label Telefono"></label>
                  </div>
                </div>

                <div class="col-sm-5">
                  <label for="Email" class="col-xs-8 col-form-label"><p>Email</p></label>
                  <div class="col-sm-11 col-md-11 col-xs-12 Email">
                    <div class="input-group">
                       <span class="input-group-addon fa fa-at"></span>
                       <input type="text" name="Email" id="Email" class="form-control" placeholder="Ej: usuario@dominio.com" value="{{$proveedor->email}}">
                    </div>

                    <label class="control-label Email"></label>
                  </div>
                </div>
              </div>

          </div>
  <div class="row">
    <div class="form-group row col-sm-12">
      <div class="col-sm-12">


          <a href="{{url('compras/proveedor/create')}}" id="Nuevo" name="Nuevo" class="btn btn-default">Nuevo
          </a>

          <button type="button" data-id="{{$proveedor->idpersona}}" id="btn-edit-proveedor" style="width:100px;height:34px;" class="btn btn-primary btn-edit-proveedor ">Modificar</button>

        <a href="{{url('compras/proveedor')}}" id="return" name="return" class="btn btn-warning">Volver al Listado
        </a>

    </div>


  </div>
  </div>

  {!!Form::close()!!}

</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{asset('js/proveedor/proveedor.js')}}">  </script>
@endsection
