@extends('layouts.admin')



@section('contenido')
   <div class="container">
    <h3>index.php</h3>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Categorias <a href="{{url('almacen/categoria/create')}}"><button class="btn btn-success">Nuevo</button></a> </h3>
          <!--  @include('almacen.categoria.search')-->
        </div>


    </div>


    <div class="row">

      <div id="myModalEdit" class="modal fade" role="dialog">
          <div class="modal-dialog">

    <!-- Modal content-->
            <div class="modal-content" >
              <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" >Categoria</h4>
              </div>

              {!!Form::open(['route'=>['almacen.categoria.update',':USER_ID'],'method'=>'PATCH','autocomplete'=>'off','role'=>'UPDATE','id'=>'form-update','name'=>'form-update'])!!}
                 <div class="modal-body" data-id="modal-edit">
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
              </div>

              <div class="modal-footer">
                <button type="button" data-id="idcategoria" class="btn btn-success btn-update">Aceptar</button>
                <button type="reset" id="cancelModal" class="btn btn-warning" data-dismiss="modal">Cancelar</button>

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

          </div>

      </div>

      <style media="screen">
      .table tbody tr:hover td, .table tbody tr:hover th {
           background-color: #eeeeea;
         }
         
      </style>

<div class="row">
      <div class="container">

          <div class="table-responsive col-lg-12 col-md-11 col-sm-10 col-xs-9">
                   <table style="width:100%;max-width:1200px;margin:15 auto;text-align:center" id="myTable" class="table table-striped table-bordered" cellspacing="0">

                     <thead>

                        <th style="text-align:center">Idcategoria</th>
                        <th style="text-align:center">Nombre</th>
                        <th style="text-align:center">Descripcion</th>
                        <th style="text-align:center">Opciones</th>


                    </thead>





                </table>


                        </div>

                   </div>
                   </div>
            </div>


    {!!Form::open(['route'=>['almacen.categoria.destroy',':USER_ID'],'method'=>'DELETE','autocomplete'=>'off','role'=>'DELETE','id'=>'form-delete'])!!}
    {!!Form::close()!!}
    </div>
@endsection


@section('scripts')


       <script src="{{asset('js/categoria/ajax_actions.js')}}"></script>

@endsection
