<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

use app\Http\Requests;
use Validator;
use Response;
//proyecto que se cambio el nombre al inicio
use app\Categoria;
use Illuminate\Support\Facades\Redirect;

use app\Http\Controllers\CategoriaController;
use DB;

class CategoriaController extends Controller
{
    //para validar
  


    public function index(Request $request)
    {

        if ($request)
        {

        //$query=trim($request->get('searchText'));

               $categorias=DB::table('categoria')->where('condicion','=','1')->orderBy('idcategoria','desc')->get();
               return view('almacen.categoria.index',["categorias"=>$categorias]);

        }

    }

    public function create()
    {
       return view('almacen.categoria.create');

    }

    public function store(Request $request)
    {

        $rules = array(
            //solo caracteres:regex:/^[a-z]+$/i;
        'Categoria'   => 'required|max:25',
        'Descripcion'   => 'required|max:200'

    );

    $validator = Validator::make($request->all(), $rules);

       if($validator->fails()){
        return Response::json([
                'success'=>false,
                'error'=>$validator->errors()->toArray()
            ]);
        }else{
            $categoria = new Categoria();
            $categoria ->nombre_categoria=$request->get('Categoria');
            $categoria ->descripcion=$request->get('Descripcion');
            $categoria ->condicion='1';

            $categoria->save();
                 return Response::json([
                'success'=>true


        ]);
       }

    }

   public function show(Request $request){

       $query=trim($request->get('searchText'));

      $paginates =  DB::table('categoria')
                    ->select('idcategoria','nombre','descripcion')
                    ->where('nombre','LIKE','%'.$query.'%')->where('condicion','=','1')->orderBy('idcategoria','desc')->get();

      return Response::json([
          'categorias'=>$paginates
        ])->header('Content-Type', 'text/plain');
    // return  View('almacen.categoria.dataload',["categorias"=>$paginates])->render();

    }

    /*    public function getDataPage(Request $request){
         $query=trim($request->get('searchText'));

      $paginates =  DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')->where('condicion','=','1')->orderBy('idcategoria','desc')->paginate(10);

        $count_query =  Categoria::where('condicion','=','1')->where('nombre','LIKE','%'.$query.'%')->count();

       $count =  Categoria::where('condicion','=','1')->count();

        $result = array(
                "count_query"=>$count_query,
                "count"=>$count

        );



   return  View('almacen.categoria.dataload',["categorias"=>$paginates,"rows_count"=>$result])->render();

    }
       */
    /*public function searching(Request $request)
    {

         if ($request){
            $query=trim($request->get('searchText'));

             $categorias=Categoria::where('nombre','LIKE','%'.$query.'%')
                    ->where('condicion','=','1')->orderBy('idcategoria','desc')->paginate(2);
             $resul =  array(
                        'success'=> true,
                        'categorias'=>$categorias
                        );

          // $out = $resul['categorias']->all() ;

           $query  =   $resul;


            }
           return $query;

        //return $out;
        //return view('almacen.categoria.show',['categoria'=>Categoria::findOrFail($id)]);
    }*/

    public function edit($id)
    {

        $categoria = Categoria::where('idcategoria','=',$id)->where('condicion','=','1')->count();
        $categoria = $categoria>0 ?  Response::json([ 'success'=>true,'categoria'=>Categoria::findOrFail($id) ]) :  Response::json([ 'success'=>false]);
        return $categoria;
        /* if($categoria){

         $idcategoria = Categoria::findOrFail($id);
        return Response::json([
                'success'=>true,
                'categoria' =>$idcategoria
        ]);

         }else{
       return Response::json([
                'success'=>false

        ]);
        }*/

    }

    public function update(Request $request,$id)
    {


        $rules = array(
                'Categoria' => 'required|max:25',
                'Descripcion' => 'required|max:200'
        );

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
        return Response::json([
                    'success'=>false,
                    'error'=>$validator->errors()->toArray()
        ]);

        }else{

        $categoria=Categoria::findOrFail($id);

       if($categoria){


        $categoria->nombre_categoria=$request->get('Categoria');
        $categoria->descripcion=$request->get('Descripcion');
        $categoria->update();

        return Response::json([
                'success'=>true

        ]);
        }


        }

        //return Redirect::to('almacen/categoria');
    }

    public function destroy($id,Request $request)
    {
       //return "dasd";

        $categoria=Categoria::findOrFail($id);
        $categoria->condicion='0';
        $categoria->update();
        //return Redirect::to('almacen/categoria');
        $message ='La categoria '. $categoria->nombre_categoria . ' fue eliminada.';

       if ($request){


        return Response::json([
                    'nombre' =>$categoria->nombre_categoria,
                    'message' =>$message,


        ]);
        }


    }
}
