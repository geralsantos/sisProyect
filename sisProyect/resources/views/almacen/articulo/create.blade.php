@extends('layouts.admin')

@section('scripts')
<script src="{{asset('js/articulo/articulo_create.js')}}"></script>

@endsection

@section('contenido')
<style>
  #form-update section ul li{
   list-style: none;

  }
</style>

<div class="container">
  {!!Form::open(array('url'=>'almacen/articulo/submit','method'=>'POST','autocomplete'=>'off','role'=>'CREATE','id'=>'form-create','name'=>'form-create', 'enctype'=>'multipart/form-data'))!!}
  @include('compras.ingresos.modal_search_proveedor')
<div class="row">


  <div class="form-group row col-sm-10 col-xs-12">
      <div class="col-sm-6">
          <label class="col-xs-3 col-form-label" for="Categoria"> <p>Categoria: </p></label>
            <div class="col-sm-10 col-xs-12 Categoria">
              <select class="Categoria form-control" id="Categoria" name="Categoria" data-toggle="tooltip" data-placement="top" title="" data-original-title="Seleccione su Categoria">
                <option value=""> Seleccione Categoria</option>

                 @foreach($categorias as $cat)
                 <option value="{{$cat->idcategoria}}"> {{$cat->nombre_categoria}} </option>
                 @endforeach

              </select>
               <label class="control-label Categoria"></label>

             </div>
       </div>
       <div class="col-sm-6">
          <label class="col-xs-3 col-form-label" for="Marca"> <p>Marca: </p></label>
              <div class="col-sm-10 col-xs-12 Marca">

                  <select class="Marca form-control" id="Marca" name="Marca" data-toggle="tooltip" data-placement="top" title="" data-original-title="Seleccione su Marca">
                    <option value=""> Seleccione Marca </option>

                     @foreach($marcas as $mar)
                     <option value="{{$mar->idmarca}}"> {{$mar->nombre_marca}} </option>
                     @endforeach

                  </select>
                  <label class="control-label Marca"></label>

               </div>
        </div>
    </div>
    <div class="form-group row row col-sm-10 col-xs-12">
      <div class="col-sm-6">
             <label for="Persona" class="col-xs-3 col-form-label"><p>Persona</p></label>
                 <div class="col-sm-10 col-xs-12 Persona ">
                     <div class="input-group col-xs-12">
                         <select  name="Persona"  id="Persona" class="form-control Persona" >
                           <option value="">Proveedor</option>
                             @foreach($proveedor as $prov)
                              <option value="{{$prov->idpersona}}">{{$prov->nombre}}</option>
                              @endforeach
                         </select>
                          <span class="input-group-btn">
                             <span data-toggle='modal' data-target='#myModalProveedorList'><button data-toggle="tooltip" data-placement="top" title="" data-original-title="Buscar" class="btn btn-default fa fa-search" type="button"></button></span>
                             <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Nuevo" href="{{route('almacen.articulo.articulotoproveedor.create',['key'=>'return_to_articulo'])}}" class="btn btn-default fa fa-user-plus">
                             </a>
                          </span>
                      </div>
                     <label class="control-label Persona"></label>
                 </div>
     </div>
   </div>
    <div class="form-group row col-sm-10 col-xs-12">
        <div class="col-sm-6">
          <label class="col-xs-3 col-form-label" for="Codigo"><p> Codigo: </p></label>
             <div class="col-sm-10 Codigo">
               <input type="text" class="form-control" name="Codigo" id="Codigo" value="">
               <label class="control-label Codigo"></label>
             </div>
        </div>

      <div class="col-sm-6">
       <label class="col-xs-3 col-form-label" for="Articulo"><p> Articulo: </p></label>
         <div class="col-sm-10 Articulo">
           <input type="text" class="form-control" name="Articulo" id="Articulo" value="">
           <label class="control-label Articulo"></label>
         </div>
      </div>
  </div>
  <div class="form-group row col-sm-10 col-xs-12">
    <div class="col-sm-6">
         <label class="col-xs-3 col-form-label" for="Stock"><p> Stock: </p></label>
          <div class="col-sm-10 Stock">
             <input type="number" class="form-control" name="Stock" id="Stock" value="" data-toggle="tooltip" data-placement="right" title="" data-original-title="Indique cantidad">
             <label class="control-label Stock"></label>
          </div>
    </div>
    <div class="col-sm-6">
          <label class="col-xs-8 col-form-label" for="Stock_min"><p> Stock Minimo: </p></label>
            <div class="col-sm-10 Stock_min">
                 <input type="number" class="form-control" name="Stock_min" id="Stock_min" value="" data-toggle="tooltip" data-placement="right" title="" data-original-title="Indique Alerta de Escasez de Articulo">
                 <label class="control-label Stock_min"></label>
             </div>
    </div>
  </div>
  <div class="form-group row col-sm-10 col-xs-12">
    <div class="col-sm-12">
      <label class="col-xs-3 control-label" for="Descripcion"> <p>Descripcion: </p></label>
        <div class="col-sm-11 Descripcion">
         <textarea  style="max-width:100%;max-height:60px" type="text" rows="3" id="Descripcion" name="Descripcion" class="form-control" value="" ></textarea>
         <label class="control-label Descripcion"></label>
        </div>
    </div>
  </div>
  <div class="form-group row col-sm-10 col-xs-12">
      <div class="col-sm-6">
          <label class="col-xs-3 col-form-label" for="Compra"><p>Compra: </p></label>
              <div class="col-sm-10 Compra">
                <input class="form-control" type="number" name="Compra" id="Compra" value="" data-toggle="tooltip" data-placement="right" title="" data-original-title="Indique a Cuanto se Compró">
                <label class="control-label Compra"></label>
              </div>
      </div>
      <div class="col-sm-6">
          <label class="col-xs-3 col-form-label" for="Venta"><p>Venta: </p></label>
            <div class="col-sm-10 Venta">
              <input type="number" class="form-control" name="Venta" id="Venta" value="" data-toggle="tooltip" data-placement="right" title="" data-original-title="Indique a Cuanto se Vende">
              <label class="control-label Venta"></label>
            </div>
      </div>
  </div>
  <div class="form-group row col-sm-10 col-xs-12">
      <div class="col-sm-6">
          <label class="col-xs-3 col-form-label"><p>Imagen</p> </label>
          <div class="col-sm-10">
              <input class="form-control" type="file" name="file" id="file" accept="image/*" value="" >
              <input type="hidden" name="imagen" id="imagen" value="">
              <input type="hidden" name="_i" id="_i" value="">
                <!--img id="img" src="{{asset('images/no-foto.png')}}" alt="" /-->
          </div>
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

  <div class="form-group row col-sm-10 col-xs-12">
    <div class="col-sm-10 pull-right">
    <button type="button" id="btn-create-articulo" class="btn btn-success btn-create-articulo">Aceptar</button>

      <a href="{{url('almacen/articulo')}}" id="return" name="return" class="btn btn-warning">Volver al Listado
         </a>
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

</div>
<div class="progress" style="display:none">

</div>
</div>
</div>
@endsection
