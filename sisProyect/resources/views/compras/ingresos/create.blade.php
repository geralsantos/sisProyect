@extends('layouts.admin')
@section('contenido')
<div class="container">

{!!Form::open(['route'=>['compras.ingresos.submit'],'method'=>'POST','autocomplete'=>'off','id'=>'form-create'])!!}

<h3>Agregar Ingresos de nuevo Articulo</h3>

<div class="row">
  <!--- Modal Start-------->
  <div id="myModalArticulo" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

<!-- Modal content-->
        <div class="modal-content" >
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" >Articulo</h4>
          </div>

             <div class="modal-body" data-id="modal-edit">
               <style media="screen">
               .table tbody tr:hover td, .table tbody tr:hover th {
                    background-color: #eeeeea;
                    cursor: pointer;
                  }
                  .modal-table{
                    -moz-user-select: none;
                    -khtml-user-select:none;
                    -webkit-user-select:none;
                    user-select:none;
                  }
               </style>
              <div class="row modal-table">
                  <div class="table-responsive col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <table style="width:100%;max-width:1200px;margin:15 auto;text-align:center" id="myTable" class="table table-striped table-bordered table-hover" cellspacing="0">
                          <thead>
                            <tr>
                              <th style="text-align:center">Codigo</th>
                              <th style="text-align:center">Nombre</th>
                              <th style="text-align:center">Stock</th>
                              <th style="text-align:center">StockMin</th>
                              <th style="text-align:center">Prec.Venta</th>
                              <th style="text-align:center;">Prec.Compra</th>
                              <th style="text-align:center">Marca</th>
                              <th style="text-align:center">Categoria</th>
                            </tr>
                          </thead>
                          <tbody>

                          </tbody>
                      </table>
                  </div>

             </div>
          </div>

          <div class="modal-footer">
             <button type="reset" id="cancelModal" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
         </div>


        <style>
          .progress{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, .5) url("{{asset('img/progress.gif')}}") no-repeat 50%;
            background-size: 70px 70px;

          }
        </style>
    <div class="progress" style="display:none">

    </div>

        </div>

      </div>

  </div>
<!--- Modal End-------->
<!--- Modal proveedor-------->
   @include('compras.ingresos.modal_search_proveedor')
   <!--- Modal End-------->
   <div class="form-group row col-sm-10 col-xs-12">
         <div class="col-sm-6">
                <label for="Persona" class="col-xs-3 col-form-label"><p>Persona</p></label>
                    <div class="col-sm-10 col-xs-12 Persona ">
                        <div class="input-group col-xs-12">
                            <select  name="Persona"  id="Persona" class="form-control Persona selectpicker" data-live-search="true">
                              <option value="">Seleccione Proveedor</option>
                                @foreach($proveedor as $prov)
                                @if($prov->nombre == $key)
                                <option selected="true" value="{{$prov->idpersona}}">{{$prov->nombre}}</option>
                                @else
                                <option value="{{$prov->idpersona}}">{{$prov->nombre}}</option>
                                @endif
                                 @endforeach
                            </select>
                             <span class="input-group-btn">
                                <span data-toggle='modal' data-target='#myModalProveedorList' ><button data-toggle="tooltip" data-placement="top" title="" data-original-title="Buscar Proveedor" aria-describedby="tooltip250146" class="btn btn-default fa fa-search" type="button"></button></span>
                                <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Nuevo Proveedor" aria-describedby="tooltip250146" href="{{route('compras.ingresos.to_proveedor.create',['key'=>'return_to_ingreso'])}}" class="btn btn-default fa fa-user-plus">

                                </a>
                             </span>
                         </div>
                        <label class="control-label Persona"></label>
                    </div>
        </div>


     </div>
      <!-- datos del proveedor start-->

     <div class="form-group row col-sm-9 col-xs-12 has-primary" id="Provider" style="display:none">

       <div class="col-sm-4">
          <label for="Tipo" class="col-xs-3 col-form-label"><p>Tipo</p></label>
              <div class="col-sm-12 Tipo">
                   <input type="text" disabled="true" class="form-control" name="Tipo" id="Tipo" value="">
                  <label class="control-label Tipo"></label>
             </div>
       </div>
         <div class="col-sm-4">
            <label for="Nombre" class="col-xs-3 col-form-label"><p>Nombre</p></label>
                <div class="col-sm-12 Nombre">
                     <input type="text" disabled="true" class="form-control" name="Nombre" id="Nombre" value="">
                    <label class="control-label Comprobante"></label>
               </div>
         </div>
         <div class="col-sm-4 Doc">
            <label for="Numero_documento" class="col-xs-3 col-form-label"><p id="Tipo">Documento</p></label>
                <div class="col-sm-12 Numero_documento">
                     <input type="text" disabled="true" class="form-control" name="Numero_documento" id="Numero_documento" value="">
                    <label class="control-label Numero_documento"></label>
               </div>
         </div>
         <div class="col-sm-4">
            <label for="Direccion" class="col-xs-3 col-form-label"><p>Direccion</p></label>
                <div class="col-sm-12 Direccion">
                     <input type="text" disabled="true" class="form-control" name="Direccion" id="Direccion" value="">
                    <label class="control-label Direccion"></label>
               </div>
         </div>

    </div>

    <!-- datos del proveedor End-->

    <div class="form-group row col-sm-10 col-xs-12">
        <div class="col-sm-6">
           <label for="Comprobante" class="col-xs-3 col-form-label"><p>Comprobante</p></label>
               <div class="col-sm-10 Comprobante">
                   <select class="form-control Comprobante" name="Comprobante" id="Comprobante" >
                     <option value="">Seleccione Comprobante</option>
                       @foreach($comprobante as $comp)
                       <option value="{{$comp->serie}}">{{$comp->tipo}} </option>

                        @endforeach
                   </select>
                   <label class="control-label Comprobante"></label>
              </div>
        </div>
   </div>

</div>
<div class="panel panel-info  ">
  <div class="panel-heading">
    <h3 class="panel-title"> Agregar Articulo </h3>
  </div>
  <div class="table-responsive panel-body">
    <div class="error-articulo">

    </div>
    <div class="row">
      <div class="form-group row col-sm-10 col-xs-12" >
          <div class="col-sm-6">
             <label for="Articulo" class="col-xs-3 col-form-label"><p>Articulo</p></label>
                 <div class="col-sm-10 Articulo">
                    <input type="button" data-toggle='modal' data-target='#myModalArticulo' class="btn btn-primary form-control" name="Articulo" id="Articulo" value="Agregar Articulo">
                </div>

          </div>

     </div>

    </div>


    <div class="row table-index">

      <div class="form-group row col-lg-12 col-md-11 col-sm-10">
          <div class="col-sm-11 col-md-10 ">
              <div class="col-lg-12">
                  <table style="width:100%;max-width:1200px;margin:15 auto;text-align:center" id="myTable2" class="table table-striped table-bordered table-hover" cellspacing="0">
                      <thead>
                        <tr>
                          <td>Eliminar</td>
                          <td>#</td>
                          <td>Codigo</td>
                          <td >Articulo</td>
                          <td style="width:90px;">Cantidad</td>
                          <td style="width:90px">Prec.Compra</td>
                          <td style="width:90px">Prec.Venta</td>
                          <td>SubTotal</td>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                  </table>

              </div>

          </div>
      </div>

      <div class="form-group row col-sm-10 col-xs-12">
          <div class="col-sm-6">

                 <div class="col-sm-10">

                    <input type="button" class="btn btn-default form-control btn-aceptar-ingreso" name="Aceptar" id="Aceptar" value="Aceptar">


                </div>
          </div>
      </div>

    </div>

  </div>
</div>
  {!!Form::close()!!}
  <style>
    .progress{
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(255, 255, 255, .5) url("{{asset('img/progress.gif')}}") no-repeat 50%;
      background-size: 70px 70px;

    }
  </style>
<div class="progress" style="display:none">

</div>
</div>

@endsection
@section('scripts')
<script type="text/javascript" src="{{asset('js/ingresos/create.js')}}">

</script>
@endsection
