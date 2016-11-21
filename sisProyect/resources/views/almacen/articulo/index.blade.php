@extends('layouts.admin')

@section('contenido')
   <div class="container">
    <h3>index.php</h3>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Articulos <a href="{{url('almacen/articulo/create')}}"><button class="btn btn-success">Nuevo</button></a> </h3>
        </div>


    </div>


    <div class="row">

      <div id="myModalEdit" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">

    <!-- Modal content-->
            <div class="modal-content" >
              <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" > Categoria</h4>
              </div>

              <style>
                #form-update section ul li{
                 list-style: none;

                }
                .modal-backdrop
                  {
                      opacity:0 !important;
                  }

              </style>
              {!!Form::open(['route'=>['almacen.articulo.update',':ARTICLE_ID'],'method'=>'PATCH','autocomplete'=>'off','role'=>'UPDATE','id'=>'form-update','class'=>'form-horizontal','name'=>'form-update', 'enctype'=>'multipart/form-data'])!!}
              @include('compras.ingresos.modal_search_proveedor')

          <div class="modal-body" data-id="modal-edit">
            <style>
              .modal-row{
                padding-left: 12%;
              }
            </style>
            <div class="row modal-row">

              <div class="form-group row col-sm-10">

                <label class="col-xs-2 col-form-label" class="control-label">Seleccione Imagen</label>
                <div class="col-sm-10">
                <input class="form-control" type="file" name="file" id="file" accept="image/*" value="" >
                <input type="hidden" name="imagen" id="imagen" value="">
                <input type="hidden" name="_i" id="_i" value="">
                  <!--img id="img" src="{{asset('images/no-foto.png')}}" alt="" /-->
                </div>
              </div>
              <div class="form-group row col-sm-10">
                <label class="col-xs-2 col-form-label" for="Categoria"> <p>Categoria: </p></label>

                  <div class="col-sm-10 Categoria">

                    <select class="Categoria form-control" id="Categoria" name="Categoria" data-toggle="tooltip" data-placement="top" title="" data-original-title="Seleccione su Categoria">
                      <option value=""> Seleccione Categoria</option>

                       @foreach($categorias as $cat)
                       <option value="{{$cat->idcategoria}}"> {{$cat->nombre_categoria}} </option>
                       @endforeach

                    </select>
                     <label class="control-label Categoria"></label>

                   </div>
                   <label class="col-xs-2 col-form-label" for="Marca"> <p>Marca: </p></label>

                      <div class="col-sm-10 Marca">

                          <select class="Marca form-control" id="Marca" name="Marca" data-toggle="tooltip" data-placement="top" title="" data-original-title="Seleccione su Marca">
                            <option value=""> Seleccione Marca </option>

                             @foreach($marcas as $mar)
                             <option value="{{$mar->idmarca}}"> {{$mar->nombre_marca}} </option>
                             @endforeach

                          </select>
                          <label class="control-label Marca"></label>

                       </div>
                    </div>
                    <div class="form-group row row col-sm-10">

                             <label for="Persona" class="col-xs-2 col-form-label"><p>Persona</p></label>
                                 <div class="col-sm-10 Persona ">
                                     <div class="input-group col-xs-12">
                                         <select  name="Persona"  id="Persona" class="form-control Persona" >
                                           <option value="">Proveedor</option>
                                             @foreach($proveedor as $prov)
                                              <option value="{{$prov->idpersona}}">{{$prov->nombre}}</option>
                                              @endforeach
                                         </select>
                                      </div>
                                     <label class="control-label Persona"></label>
                                 </div>

                   </div>
                    <div class="form-group row col-sm-10">
                     <label class="col-xs-2 col-form-label" for="Codigo"><p> Codigo: </p></label>
                       <div class="col-sm-10 Codigo">
                         <input type="text" class="form-control" name="Codigo" id="Codigo" value="">
                         <label class="control-label Codigo"></label>
                       </div>
                    </div>
              <div class="form-group row col-sm-10">
               <label class="col-xs-2 col-form-label" for="Articulo"><p> Articulo: </p></label>
                 <div class="col-sm-10 Articulo">
                   <input type="text" class="form-control" name="Articulo" id="Articulo" value="">
                   <label class="control-label Articulo"></label>
                 </div>
              </div>
              <div class="form-group row col-sm-10">
                 <label class="col-xs-2 col-form-label" for="Stock"><p> Stock: </p></label>
                  <div class="col-sm-10 Stock">
                     <input type="number" class="form-control" name="Stock" id="Stock" value="" data-toggle="tooltip" data-placement="right" title="" data-original-title="Indique cantidad">
                     <label class="control-label Stock"></label>

                  </div>
              </div>
              <div class="form-group row col-sm-10">
                <label class="col-xs-2 col-form-label" for="Stock_min"><p> Stock Minimo: </p></label>
                  <div class="col-sm-10 Stock_min">
                       <input type="number" class="form-control" name="Stock_min" id="Stock_min" value="" data-toggle="tooltip" data-placement="right" title="" data-original-title="Indique Alerta de Escasez de Articulo">
                       <label class="control-label Stock_min"></label>

                   </div>
              </div>
              <div class="form-group row col-sm-10">
                  <label class="col-xs-2 control-label" for="Descripcion"> <p>Descripcion: </p></label>
                    <div class="col-sm-10 Descripcion">
                     <textarea  style="max-width:100%;max-height:60px" type="text" rows="3" id="Descripcion" name="Descripcion" class="form-control" value="" ></textarea>
                     <label class="control-label Descripcion"></label>

                    </div>
              </div>
              <div class="form-group row col-sm-10">
                  <label class="col-xs-2 col-form-label" for="Venta"><p> Prec. Venta: </p></label>
                    <div class="col-sm-10 Venta">
                      <input type="number" class="form-control" name="Venta" id="Venta" value="" data-toggle="tooltip" data-placement="right" title="" data-original-title="Indique a Cuanto se Vende">
                      <label class="control-label Venta"></label>

                    </div>
              </div>
              <div class="form-group row col-sm-10">
                  <label class="col-xs-2 col-form-label" for="Compra"><p> Prec. Compra: </p></label>
                      <div class="col-sm-10 Compra">
                        <input class="form-control" type="number" name="Compra" id="Compra" value="" data-toggle="tooltip" data-placement="right" title="" data-original-title="Indique a Cuanto se Compró">
                        <label class="control-label Compra"></label>

                      </div>
              </div>
              <script>
                      $(document).on('ready', function() {
                          $("#file").fileinput({
                            language: 'es',
                              browseClass: "btn btn-primary btn-block",
                              showCaption: false,
                              showRemove: false,
                              showUpload: false,
                              previewFileType: "image",
                              allowedFileExtensions: ["jpg", "tiff","tif", "png","dds","wdp" ,"emf","ico","wmf","jpeg",'svg','gif','bmp'],
                               previewClass: "bg-warning",
                              initialPreview: [
                                  "{{asset('images/no-foto.png')}}"

                        ],
                        initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
                        initialPreviewFileType: 'image' // image is the default and can be overridden in config below

                              /*  initialPreview: [
                                  "{{asset('images/no-foto.png')}}"
                                 ],
                              initialPreviewAsData: true,
                              initialPreviewConfig: [
                                  {caption: "Earth.jpg", size: 1218822, width: "120px", key: 2, showZoom: false}
                                ]*/

                                });
                            });
              </script>

              <!--input type="file" name="file" id="file" -->

              <!--input type="hidden" name="fake_image" id="fake_image" value=""-->
              <!--progress id="prog" max="100" value="0" style="display:none;"></progress-->

            </div>

          </div>

                 {!!Form::close()!!}


                  <div class="modal-footer">

                        <button type="button" data-id="idarticulo" class="btn btn-success btn-update-articulo">Aceptar</button>
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




      <div class="container">


        <style>
           
          .table tbody tr:hover td, .table tbody tr:hover th {
               background-color: #eeeeea;
             }
        </style>
          <div class="table-responsive col-lg-12 col-md-11 col-sm-10 col-xs-9">
                   <table style="width:100%;max-width:1200px;margin:15 auto;text-align:center" id="myTable" class="table table-striped table-bordered" cellspacing="0">

                     <thead>


                       <th style="text-align:center">Codigo</th>
                       <th style="text-align:center">Nombre</th>
                       <th style="text-align:center">Stock</th>
                       <th style="text-align:center">StockMin.</th>
                       <th style="text-align:center">Venta</th>
                       <th style="text-align:center;width:120px;">Compra</th>
                       <th style="text-align:center">Opciones</th>

                    </thead>

                    <tbody>

                    </tbody>



                </table>


                        </div>

                   </div>

            </div>


    {!!Form::open(['route'=>['almacen.articulo.destroy',':ARTICLE_ID'],'method'=>'DELETE','autocomplete'=>'off','role'=>'DELETE','id'=>'form-delete'])!!}
    {!!Form::close()!!}
    </div>
@endsection


@section('scripts')

        <script src="{{asset('js/articulo/articulo.js')}}">

        </script>


@endsection
