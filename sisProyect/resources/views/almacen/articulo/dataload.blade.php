@foreach($articulos as $art)
 <tr data-id='{{$art->idartegoria}}' data-name='{{$art->nombre}}'>

     <td>
         {{$art->codigo}}
     </td>
     <td>
         {{$art->nombre}}
     </td>
     <td>
         {{$art->descripcion}}
     </td>
     <td>
         {{$art->stock}}
     </td>
     <td>
         {{$art->precio_venta}}
     </td>
     <td>
         {{$art->precio_venta}}
     </td>

     <td width="300px">
     <a href="{{ URL::action('ArticuloController@edit',$art->idarticulo) }}"><button class="btn btn-info btn-edit" data-toggle="modal" data-target="#myModalEdit">Editar</button></a>
     <a href=""><button class="btn btn-danger btn-delete">Eliminar</button></a>
     </td>
 </tr>
 @endforeach
