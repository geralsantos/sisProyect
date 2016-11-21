@extends('layouts.admin')
@section('contenido')
 <div class="container">

<div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3> Agregar un nuevo Ingreso
            <a href="{{route('compras.ingresos.create')}}"><button class="btn btn-success">Nuevo</button></a>
            </h3>

        </div>


    </div>
    <style media="screen">
    .table tbody tr:hover td, .table tbody tr:hover th {
         background-color: #eeeeea;
         cursor: pointer;
       }

    </style>
    <div class="row">


     <div class="container">
 <div class="table-responsive col-lg-12 col-md-11 col-sm-10 col-xs-9">
                            <table style="width:100%;max-width:1200px;margin:15 auto;text-align:center" id="myTable" class="table table-hover table-striped">
                              <thead>
                                <th style="text-align:center">#</th>
                                <th style="text-align:center">Proveedor</th>
                                <th style="text-align:center">Comprobante</th>
                                <th style="text-align:center">Fecha</th>
                                <th style="text-align:center">Impuesto</th>
                                <th style="text-align:center">Estado</th>
                                <th style="text-align:center">Opciones</th>

                             </thead>
                              <tbody>

                              </tbody>





                         </table>


                                 </div>



                   </div>
        </div>
        {!!Form::open(['route'=>['compras.ingresos.destroy',':INGRESO_ID'],'method'=>'DELETE','autocomplete'=>'off','role'=>'DELETE','id'=>'form-delete'])!!}
        {!!Form::close()!!}
        </div>

@endsection
@section('scripts')

 <script src="{{asset('js/ingresos/ajax_ingresos.js')}}"></script>


@endsection
