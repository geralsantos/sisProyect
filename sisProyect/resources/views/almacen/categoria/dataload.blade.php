
@foreach($categorias as $cat)
 <tr data-id='{{$cat->idcategoria}}' data-name='{{$cat->nombre}}'>

     <td>
         {{$cat->idcategoria}}
     </td>
     <td>
         {{$cat->nombre}}
     </td>
     <td>
         {{$cat->descripcion}}
     </td>
     <td width="300px">
     <a href="{{ URL::action('CategoriaController@edit',$cat->idcategoria) }}"><button class="btn btn-info btn-edit" data-toggle="modal" data-target="#myModalEdit">Editar</button></a>
     <a href=""><button class="btn btn-danger btn-delete">Eliminar</button></a>
     </td>
 </tr>
 @endforeach
