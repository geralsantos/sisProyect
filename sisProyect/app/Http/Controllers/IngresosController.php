<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

use app\Http\Requests;
use DB;
use Response;
use Validator;
use Illuminate\Facades\Redirect;
use app\Http\Controllers\Controller;
use app\Ingresos;
use app\DetalleIngreso;
use Carbon\Carbon;
class IngresosController extends Controller
{
    //
  
    public function index(Request $request){

    if($request){
        $ingreso = DB::table('ingreso')
                      ->join('persona','ingreso.idproveedor','=','persona.idpersona')
                      ->join('comprobante','ingreso.idcomprobante','=','comprobante.serie')
                      ->select('ingreso.idingreso as idingreso','persona.nombre as nombre',
                               DB::raw("CONCAT(comprobante.tipo ,': ', comprobante.serie,'-', ingreso.num_comprobante) as tipo"),
                               'ingreso.fecha_hora as fecha_hora',
                               'ingreso.impuesto as impuesto','ingreso.estado as estado')
                               ->where('persona.tipo_persona','=',"Bienes")
                      ->get();
    }

    return view('compras.ingresos.index',["ingresos"=>$ingreso]);
    }



    public function fromIngreso_toProveedor($key)
    {

      return view('compras.proveedor.create',["key"=>$key]);

    }

      public function create(Request $request){
        $key = $request->get("key");
      $articulo = DB::table('articulo')
            ->join('marca','marca.idmarca',"=","articulo.idmarca")
            ->join('categoria','categoria.idcategoria',"=","articulo.idcategoria")
            ->select('articulo.idarticulo as idarticulo','articulo.codigo as codigo','articulo.nombre as nombre','articulo.stock as stock','articulo.stock_minimo as stock_minimo','articulo.precio_venta as precio_venta','articulo.precio_compra as precio_compra','marca.nombre_marca as marca','categoria.nombre as categoria')
            ->where("articulo.estado","=","Activo");
      $comprobante = DB::table('comprobante')->get();
      $proveedor = DB::table('persona')
                       ->where("tipo_persona","=","Bienes")
                       ->where("estado","=","activo")
                       ->get();

      return view('compras.ingresos.create',["articulos"=>$articulo,"comprobante"=>$comprobante,"proveedor"=>$proveedor,"key"=>$key]);
    }

    public function store(Request $request)
    {
        //
        //return

      /* $rules = array(
            "Persona"=>"required",
            "Comprobante"=>"required|in:FA01,BO01",
            "cantidad"=>"required|numeric",
            "precio_compra"=>"required|numeric",
            "precio_venta"=>"required|numeric"
          );*/
            /*  foreach ($this->$request->get("cantidad") as $key => $value) {
                    $rules['cantidad.'.$key] = "required|numeric";
                    $rules['precio_compra.'.$key] = "required|numeric";
                    $rules['precio_venta.'.$key] = "required|numeric";


              }*/
            $rules = [];
            $cantidad = count($request->get('cantidad')) == 0 ? 0 :(count($request->get('cantidad'))-1);
           //return ($cantidad);
        foreach (range(0, $cantidad) as $number) {
             //return ($number);
              $rules['Persona'] = 'required';
              $rules['Comprobante'] = 'required';
              $rules['cantidad.'. $number] = 'required|numeric';
              $rules['precio_compra.' . $number] = 'required|numeric';
              $rules['precio_venta.' . $number] = 'required|numeric';

          }

      $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
        return Response::json([
                'success'=>false,
                'error'=>$validator->errors()->toArray()
            ]);
        }else {
           if ($request->get('precio_compra') > $request->get('precio_venta')) {
            return Response::json([
                    'success'=>false,
                    'error'=>["precio_compra"=>"El Precio de Compra debe ser menor al Precio de Venta "]
                ]);
          }
          try {
          DB::beginTransaction();
          $ingreso = new Ingresos();
          $zona_horaria = Carbon::now('America/Lima');

          $tipo = $request->get('Comprobante') == "FA01" ? "FA01" : "BO01";

          $num_comprobante = DB::table('ingreso')
          ->select('idcomprobante')
          ->where('idcomprobante',"=",$tipo)->count();
          $num_comprobante =$num_comprobante>9 ? "0$num_comprobante":($num_comprobante>99?$num_comprobante:"00$num_comprobante");
          $ingreso->idproveedor=$request->get('Persona');
          $ingreso->idcomprobante=$request->get('Comprobante');
          $ingreso->num_comprobante=$num_comprobante;
          $ingreso->fecha_hora=$zona_horaria;
          $ingreso->impuesto="0.18";
          $ingreso->estado="Activo";
          $ingreso->save();

          $count = 0;

          $idarticulo=$request->get('idarticulo');
          $codigo = $request->get("codigo");
          $nombre = $request->get("nombre");
          $cantidad = $request->get("cantidad");
          $precio_compra = $request->get("precio_compra");
          $precio_venta = $request->get("precio_venta");

         while ($count <  count($idarticulo)) {
           $detalle = new DetalleIngreso();
           $detalle->idingreso=$ingreso->idingreso;
           $detalle->idarticulo = $idarticulo[$count];
           $detalle->cantidad = $cantidad[$count];
           $detalle->precio_compra = $precio_compra[$count];
           $detalle->precio_venta = $precio_venta[$count];
           $detalle->save();

           $count++;

         }
          DB::commit();
          return Response::json([
                  'success'=>true

              ]);
        } catch (\Exception $e) {
            DB::rollback();
        }

      }
    }

    public function update(Request $request)
    {
        //
    }
    public function destroy(Request $request,$id)
    {
        //
        $ingreso=Ingresos::findOrFail($id);
          $ingreso->estado='Cancelado';
          $ingreso->update();
          //return Redirect::to('almacen/categoria');
          //$message ='El Ingreso '. $ingreso->tipo .':'. $ingreso->serie.'-'.$ingreso->num_comprobante.' fue cancelado.';

         if ($request){


          return Response::json([
                       'success' =>true


          ]);
          }
    }
  /*  public function show(Request $request){

        //return "das";

    }*/

   public function edit($id){

       $ingreso = Ingresos::where('idingreso','=',$id)->where('estado','=','Activo')->count();
       $ingreso = $ingreso > 0 ?  Response::json([ 'success'=>true,'ingreso'=>Ingresos::findOrFail($id) ]) :  Response::json([ 'success'=>false]);

       return $ingreso;

   }



}
