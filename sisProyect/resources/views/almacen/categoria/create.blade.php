@extends('layouts.admin')
@section('contenido')



{!! Form::open(array('url'=>'almacen/categoria/submit','method' => 'POST',
          'id' => 'form-create'))!!}


<div class="container">
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






    <h3>Registre una nueva Categoria de Articulo</h3><br>
     <style>
       .modal-row{
         padding-left: 12%;
       }
     </style>
      <div class="row modal-row">
       <div class="form-group row col-sm-10">
         <label class="col-xs-4 col-form-label" for="Stock_min"><p> Nombre: </p></label>
           <div class="col-sm-10 Categoria">
                <input type="text" class="form-control" name="Categoria" id="Categoria" value="">
                <label class="control-label Categoria"></label>

            </div>
       </div>
       <div class="form-group row col-sm-10">
           <label class="col-xs-4 control-label" for="Descripcion"> <p>Descripcion: </p></label>
             <div class="col-sm-10 Descripcion">
              <textarea  style="max-width:100%;max-height:60px" type="text" rows="3" id="Descripcion" name="Descripcion" class="form-control" value="" ></textarea>
              <label class="control-label Descripcion"></label>

             </div>
       </div>
     </div>
     <div class="form-group row col-sm-10">
       <div class="col-sm-10 pull-right">
       <button type="submit" id="btn-create-articulo" class="btn btn-success btn-create">Aceptar</button>
       <a href="{{route('almacen.categoria.index')}}"> <input type="button" id="return" class="btn btn-warning" name="return"  value="Volver al Listado" /></a>
         </div>
     </div>
     <div class="progress" style="display:none">

     </div>
         </div>

     {!!Form::close()!!}

@endsection
@section('scripts')
<script src="{{asset('js/categoria/ajax_registro.js')}}"></script>

@endsection
