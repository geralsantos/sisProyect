{!!Form::Open(array('url'=>'compras/ingresos/dataload','method'=>'POST','rol'=>'search','id'=>'form-search','autocomplete'=>'off'))!!}
<div class="form-group">
    
    <div class="input-group">
        
        <input type="text" class="form-control" name="searchText" id="searchText" value="" placeholder="Buscar..." >
        <span class="input-group-btn">
            <button type="button"  class="btn btn-primary"> Buscar</button>
            
        </span>
    </div>
    
</div>



{!!Form::close()!!}