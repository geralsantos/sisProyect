@extends('layouts.admin')


@section('contenido')

<div class="container">

<style media="screen">
.table tbody tr:hover td, .table tbody tr:hover th {
     background-color: #eeeeea;
     cursor: pointer;
   }
   .table{
     -moz-user-select: none;
     -khtml-user-select:none;
     -webkit-user-select:none;
     user-select:none;
   }
</style>
  <h3>index proveedor</h3>
  <div class="row">
    <div class="form-group col-sm-10 col-xs-12">
      <div class="col-sm-6">
        <div class="col-sm-10 col-xs-12">
          <a href="{{route('compras.proveedor.create')}}" class="btn btn-default fa fa-user-plus">
          </a>
        </div>
      </div>
    </div>
  </div>
   <div class="row">
     <div class="container col-lg-11 col-sm-12">
       <div class="table-responsive col-lg-12 col-md-12 col-sm-11 col-xs-11">
         <table style="width:100%;max-width:1200px;margin:15 auto;text-align:center" id="myTable" class="table table-hover table-bordered table-striped" >
           <thead>
             <tr>
               <th style="text-align:center">#</th>
               <th style="text-align:center">Tipo</th>
               <th style="text-align:center">Nombre</th>
               <th style="text-align:center">Documento</th>
               <th style="text-align:center">Num.Documento</th>
               <th style="text-align:center">Dirección</th>
               <th style="text-align:center">Telefono</th>
               <th style="text-align:center">Email</th>
               <th style="text-align:center">Eliminar</th>
             </tr>
           </thead>
           <tbody>
             @foreach($proveedores as $proveedor)
             <tr>
               <td>{{$proveedor->idpersona}}</td>
               <td>{{$proveedor->tipo_persona}}</td>
               <td>{{$proveedor->nombre}}</td>
               <td>{{$proveedor->tipo_documento}}</td>
               <td>{{$proveedor->num_documento}}</td>
               <td>{{$proveedor->direccion}}</td>
               <td>{{$proveedor->telefono}}</td>
               <td>{{$proveedor->email}}</td>
               <td class="cls_option"><i class='fa fa-trash btn btn-danger btn-delete-proveedor' data-toggle='tooltip' data-placement='top' title='' data-original-title='Eliminar'></i><span ></span></td>
              </tr>
             @endforeach
           </tbody>
         </table>

       </div>

     </div>
     {!! Form::open(['route'=>['compras.proveedor.destroy',':PROVEEDOR_ID'],'method'=>'DELETE','id'=>'form-delete','role'=>'DELETE', 'autocomplete'=>'offs']) !!}
     {!!Form::close()!!}
   </div>

</div>

@endsection
@section('scripts')
<script type="text/javascript" src="{{asset('js/proveedor/proveedor.js')}}"> </script>
@endsection
