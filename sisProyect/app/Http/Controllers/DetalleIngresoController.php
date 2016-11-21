<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

use app\Http\Requests;
use DB;
use Response;
use Validator;
use app\DetalleIngreso;
use app\Http\Controllers\Controller;
use Illuminate\Facades\Redirect;
use Carbon\Carbon;
class DetalleIngresoController extends Controller
{
    //
   
    public function detail (Request $request,$id){

        //$param = trim($request->get('id'));
      $tabla_detalle = DB::table('detalle_ingreso')
            ->join('ingreso','detalle_ingreso.idingreso','=','ingreso.idingreso')
            ->join('comprobante','ingreso.idcomprobante','=','comprobante.serie')
            ->join('articulo','detalle_ingreso.idarticulo','=','articulo.idarticulo')
            ->select('ingreso.idingreso as idingreso','articulo.codigo as codigo','articulo.nombre as articulo','detalle_ingreso.cantidad as cantidad','detalle_ingreso.precio_compra as precio_compra','detalle_ingreso.precio_venta as precio_venta',DB::raw('(detalle_ingreso.precio_compra*detalle_ingreso.cantidad) as subtotal'))
            ->where('detalle_ingreso.idingreso','=',$id)
            ->get();

     $tabla_ingreso = DB::table('ingreso')
            ->join('persona','persona.idpersona','=','ingreso.idproveedor')
            ->join('comprobante','ingreso.idcomprobante','=','comprobante.serie')
            ->join('detalle_ingreso','detalle_ingreso.idingreso','=','ingreso.idingreso')
            ->select('persona.tipo_persona as tipo_persona','persona.nombre as proveedor','comprobante.tipo as tipo_comprobante','comprobante.serie as serie_comprobante','ingreso.num_comprobante as num_comprobante','ingreso.fecha_hora as fecha_hora','ingreso.impuesto as impuesto',DB::raw('sum(detalle_ingreso.cantidad * detalle_ingreso.precio_compra) as total'))
            ->where('ingreso.idingreso','=',$id)->first();
        /* $result = array(
                'detalle'=>$table_detalle
        //DB::raw('sum(detalle_ingreso.cantidad * detalle_ingreso.precio_compra) as total'))
        );*/
      //  return  view('compras.ingresos.detalle_ingreso',['detalle_ingreso'=>$result]);
         return view('compras.ingresos.detalle_ingreso',['tabla_detalle'=>$tabla_detalle,'tabla_ingreso'=>$tabla_ingreso]);

   }
}
