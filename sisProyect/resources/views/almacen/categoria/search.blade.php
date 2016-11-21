{!! Form::Open(array('url'=>'almacen/categoria/dataload','method'=>'post','autocomplete'=>'off','role'=>'search','id'=>'form-search')) !!}
<div class="form-group">
    
    <div class="input-group">
    <input type="text" class="form-control" id="searchText" name="searchText" value="" placeholder="Buscar..." >
         <span class="input-group-btn">
            <button type="button" class="btn btn-primary">Buscar</button>
            
         </span>
    </div>
</div>

{{Form::close()}}