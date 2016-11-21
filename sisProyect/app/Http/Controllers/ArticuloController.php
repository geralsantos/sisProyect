<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

use app\Http\Requests;
use Validator;
use Response;
//proyecto que se cambio el nombre al inicio
use app\Articulo;
use Illuminate\Support\Facades\Redirect;
//use \Input as Input;
use Illuminate\Support\Facades\Input;
use app\Http\Controllers\ArticuloController;
use DB;

use Illuminate\Support\Facades\File;


class ArticuloController extends Controller
{
    //

  /*public function __construct()
    {
        $this->middleware('auth');
    }*/


  public function fromArticulo_toProveedor($key)
  {

    return view("compras.proveedor.create",["key"=>$key]);
  }
    public function index(Request $request){

        if($request){
            $articulos = DB::table('articulo')->where('estado','=','Activo')->orderBy("idarticulo","desc")->get();
            $categorias=DB::table('categoria')->where('condicion','=','1')->orderBy('idcategoria','desc')->get();
            $marcas=DB::table('marca')->orderBy('idmarca','desc')->get();
            $proveedor = DB::table('persona')
                             ->where("persona.estado","=","activo")
                             ->get();
             return view('almacen.articulo.index',["articulos"=>$articulos,"categorias"=>$categorias,"marcas"=>$marcas,"proveedor"=>$proveedor]);

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$articulos = DB::table('articulo')->where('estado','=','Activo')->orderBy("idarticulo","desc")->get();
        $categorias=DB::table('categoria')->where('condicion','=','1')->orderBy('idcategoria','desc')->get();
        $marcas=DB::table('marca')->orderBy('idmarca','desc')->get();
        $proveedor = DB::table('persona')
                         ->where("persona.estado","=","activo")
                         ->get();
        return view('almacen.articulo.create',["categorias"=>$categorias,"marcas"=>$marcas,"proveedor"=>$proveedor]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
        $rules = array(
            'Categoria' =>'required',
            'Marca' => 'required',
            'Persona' => 'required',
            'Codigo' =>'required',
            'Articulo'=>'required|max:25',
            'Stock'=>'required|numeric',
            //'Stock_min'=>'required|numeric',
            'Stock_min'=>'required|numeric',
            'Descripcion'=>'required|max:150',
            'Venta'=>'required|numeric',
            'Compra'=>'required|numeric'
        );

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
        return Response::json([
                'success'=>false,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{

            $articulo = new Articulo();
            if ($request->get('Compra') > $request->get('Venta')) {
              return Response::json([
                      'success'=>false,
                      'error'=>["Compra"=>"El Precio de Compra debe ser menor al Precio de Venta "]
                  ]);
            }
            $articulo->idcategoria=$request->get('Categoria');
            $articulo->idpersona=$request->get('Persona');
            $articulo->codigo=$request->get('Codigo');
            $articulo->nombre=$request->get('Articulo');
            $articulo->descripcion=$request->get('Descripcion');


              if(Input::hasFile('file')){
                 $file = Input::file('file');
                 $file->move('images', $file->getClientOriginalName());
                 $file = $file->getClientOriginalName();
               }else{
                 $file = "no-foto.png";
               }

            $articulo->imagen=$file;
            $articulo->estado="Activo";
            $articulo->precio_venta=$request->get('Venta');
            $articulo->stock=$request->get('Stock');
            $articulo->stock_minimo=$request->get('Stock_min');
            $articulo->idmarca=$request->get('Marca');
            $articulo->precio_compra=$request->get('Compra');
            $articulo->save();

                 return Response::json([
                'success'=>true


        ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $articulo = Articulo::where('idarticulo','=',$id)->where('estado','=','Activo')->count();
      $articulo = $articulo > 0 ?  Response::json([ 'success'=>true,'articulo'=>Articulo::findOrFail($id) ]) :  Response::json([ 'success'=>false]);

      return $articulo;

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $rules = array(
          'Categoria' =>'required',
          'Marca' => 'required',
          'Persona' => 'required',
          'Articulo'=>'required|max:25',
          'Codigo' =>'required',
          'Stock'=>'required|numeric',
        //  'Stock_min'=>'required|numeric',
          'Stock_min'=>'required|numeric',
          'Descripcion'=>'required|max:150',
          'Venta'=>'required|numeric',
          'Compra'=>'required|numeric'
      );
       $validator = Validator::make($request->all(),$rules);
       if ($validator->fails()) {
         return Response::json([
                'success'=>false,
                'error'=>$validator->errors()->toArray()

         ]);
       }else {

         $articulo=Articulo::findOrFail($id);
         if ($request->get('Compra') > $request->get('Venta')) {
           return Response::json([
                   'success'=>false,
                   'error'=>["Compra"=>"El Precio de Compra debe ser menor al Precio de Venta "]
               ]);
         }
        if($articulo){


           $articulo->idcategoria=$request->get('Categoria');
           $articulo->idpersona=$request->get('Persona');
           $articulo->nombre=$request->get('Articulo');
           $articulo->stock=$request->get('Stock');
           $articulo->codigo=$request->get('Codigo');
           $articulo->descripcion=$request->get('Descripcion');


             if(Input::hasFile('file')){
                if ($id == $request->get('_i')) {
                  $file = Input::file('file');
                   $file->move('images', $file->getClientOriginalName());
                     $file = $file->getClientOriginalName();
                }else {
                 $file = $request->get('imagen');
                }
              }else{
                $file = $request->get('imagen');
              }

           $articulo->imagen=$file;
           $articulo->estado="Activo";
           $articulo->precio_venta=$request->get('Venta');
           $articulo->stock_minimo=$request->get('Stock_min');
           $articulo->idmarca=$request->get('Marca');
           $articulo->precio_compra=$request->get('Compra');
           $articulo->update();

           return Response::json([
                    'success'=>true
           ]);
        }
      }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request,$id)
    {
        //
        $articulo=Articulo::findOrFail($id);
        $articulo->estado='Inactivo';
        $articulo->update();
        //return Redirect::to('almacen/categoria');
        $message ='El articulo '. $articulo->nombre . ' fue eliminado.';

       if ($request){


        return Response::json([
                    'nombre' =>$articulo->nombre,
                    'message' =>$message,


        ]);
        }
    }
}
