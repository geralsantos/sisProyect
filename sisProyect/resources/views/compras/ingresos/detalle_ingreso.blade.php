
@extends('layouts.admin')
@section('contenido')

<div class="container">
<div class="row">

  <div class="form-group row col-sm-10 col-xs-12">
        <div class="col-xs-6">
          <label class="col-xs-3 col-form-label" for="Persona"> <p>Proveedor: </p></label>
          <div class="col-sm-10 Proveedor">
               <input type="text" class="form-control" name="tipo_persona" id="tipo_persona" value="{{$tabla_ingreso->tipo_persona}}">
          </div>
        </div>
  </div>
  <div class="form-group row col-sm-10 col-xs-12">
        <div class="col-xs-6">
              <label class="col-xs-3 col-form-label" for="Persona"> <p>Persona: </p></label>
              <div class="col-sm-10 Persona">
                 <input type="text" class="form-control" name="Persona" id="Persona" value="{{$tabla_ingreso->proveedor}}">
               </div>
        </div>
        <div class="col-xs-6">
              <label class="col-xs-3 col-form-label" for="tipo_comprobante"><p> Comprobante: </p></label>
              <div class="col-sm-10 tipo_comprobante">
                 <input type="text" class="form-control" name="tipo_comprobante" id="tipo_comprobante" value="{{$tabla_ingreso->tipo_comprobante}}">
              </div>
        </div>

  </div>

<div class="form-group row col-sm-10 col-xs-12">
     <div class="col-xs-6">
        <label class="col-xs-3 col-form-label" for="serie_comprobante"><p> Serie: </p></label>
          <div class="col-sm-10 serie_comprobante">
              <input type="text" class="form-control" name="serie_comprobante" id="serie_comprobante" value="{{$tabla_ingreso->serie_comprobante}}">
          </div>
     </div>
     <div class="col-xs-6">
        <label class="col-xs-3 col-form-label" for="num_comprobante"><p> Numero: </p></label>
          <div class="col-sm-10 num_comprobante">
              <input type="number" class="form-control" name="num_comprobante" id="num_comprobante" value="{{$tabla_ingreso->num_comprobante}}" >
          </div>
    </div>
  </div>

  <div class="form-group row col-sm-10 col-xs-12">
      <div class="col-xs-6">
          <label class="col-xs-3 col-form-label" for="fecha_hora"><p> Emitida: </p></label>
            <div class="col-sm-10 fecha_hora">
                 <input type="text" class="form-control" name="fecha_hora" id="fecha_hora" value="{{$tabla_ingreso->fecha_hora}}">
             </div>
      </div>
      <div class="col-xs-6">
          <label class="col-xs-3 col-form-label" for="fecha_hora"><p> IGV: </p></label>
            <div class="col-sm-10 igv">

                 <input type="text" class="form-control" name="igv" id="igv" value="{{$tabla_ingreso->impuesto}}">
             </div>
      </div>
  </div>

  <div class="form-group row col-sm-10 col-xs-12">
        <div class="col-xs-6">
              <div class="col-sm-5 Persona">
                <a href="{{url('compras/ingresos')}}">
                 <input type="button" class="btn btn-default form-control" name="return" id="return" value="Inicio">
                 </a>
               </div>


               <div class="col-sm-5 tipo_comprobante">
                 <a href="{{url('compras/ingresos/create')}}">
                  <input type="button" class="btn btn-success form-control" name="nuevo" id="nuevo" value="Nuevo">
                  </a>
                </div>
        </div>

  </div>

</div>
<br>
<style media="screen">
.table tbody tr:hover td, .table tbody tr:hover th {
     background-color: #eeeeea;
   }
</style>
    <div class="row">
      <div class=" form-group row col-lg-12 col-md-11 col-sm-10 col-xs-12">
          <div class="table-responsive col-xs-12 col-md-12">
            <div class=" col-lg-12">
              <table style="width:100%;max-width:1200px;margin:15 auto;text-align:center" id="myTable" class="table table-striped table-bordered table-hover" cellspacing="0" >
                <thead>
                  <tr>
                    <td>#</td>
                    <td>Codigo</td>
                    <td>Articulo</td>
                    <td>Cantidad</td>
                    <td>Prec.Compra</td>
                    <td>Prec.Venta</td>
                    <td>SubTotal</td>

                   </tr>
                </thead>
                <tbody>
                  @foreach($tabla_detalle as $det_ing)
                  <tr>
                    <td>
                      {{$det_ing->idingreso}}
                    </td>
                    <td>
                      {{$det_ing->codigo}}
                    </td>
                    <td>
                      {{$det_ing->articulo}}
                    </td>
                    <td>
                      {{$det_ing->cantidad}}
                    </td>
                    <td>
                      {{$det_ing->precio_compra}}
                    </td>
                    <td>
                      {{$det_ing->precio_venta}}
                    </td>
                    <td>
                      {{$det_ing->subtotal}}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="2">Total (incluído IGV)</td>
                    <td>S/.{{$tabla_ingreso->total+($tabla_ingreso->impuesto*$tabla_ingreso->total)}}</td>
                   </tr>
                </tfoot>
              </table>
            </div>
          </div>

    </div>
    </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript" src="{{asset('js/ingresos/ingreso_detalle.js')}}">

</script>

@endsection
