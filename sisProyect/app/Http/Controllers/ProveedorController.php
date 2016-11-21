<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

use app\Http\Requests;
use DB;
use Response;
use Validator;
use app\Http\Controllers\Controller;
use app\Persona;


class ProveedorController extends Controller
{
    //

    
    public function fromProveedor_toArticulo(Request $request)
    {
          $key = $request->get("key");
          return view('almacen.articulo.create',["key"=>$key]);

    }
    public function index(Request $request){

        $proveedor = DB::table('persona')
                         ->where("persona.estado","=","activo")
                         ->get();
        return view('compras.proveedor.index',["proveedores"=>$proveedor]);

    }
    public function create(Request $request){
      $key = $request->get("key");
      return view("compras.proveedor.create",["key"=>$key]);

    }
    public function show(Request $request, $id)
    {
      $proveedor = Persona::findOrFail($id);
      return view("compras.proveedor.show",["proveedor"=>$proveedor]);
    }
    public function update(Request $request, $id)
    {
      $has_num_documento = DB::table("persona")->select("num_documento")
      ->where("idpersona","<>",$id)
      ->where("num_documento","=",$request->get("Documento"))
      ->first();

      $has_email=DB::table("persona")
      ->select("email")
      ->where("idpersona","<>",$id)
      ->where("email","=",$request->get("Email"))
      ->first();

      //  $result["result"]->num_documento;
    //  return $result["num_documento"]->num_documento;

      $rules = array(
        "Tipo_Proveedor"=>"required",
        "Nombre"=>"required|string|max:40",
        "Documento"=>"required|max:8|min:8",
        "Direccion"=>"required",
        "Telefono"=>"required|max:9|min:7",
        "Email"=>"required|email|max:60"
      );
      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          return Response::json([
              'success'=>false,
              'error'=>$validator->errors()->toArray()
          ]);
      }else {
        $result = array(
                  'num_documento'=>$has_num_documento,
                  'email'=>$has_email
          );
        if ($has_num_documento) {

          if ($result["num_documento"]->num_documento == $request->get("Documento")) {
             return Response::json([
                  'success'=>false,
                  'error'=>["Documento"=>"El campo Documento ya existe!."]
             ]);
          }
        }else if($has_email) {

            return Response::json([
                 'success'=>false,
                 'error'=>["Email"=>"El campo Email ya existe!."]
            ]);

        }

        $proveedor = Persona::findOrFail($id);
        $proveedor->tipo_persona = $request->get("Tipo_Proveedor");
        $proveedor->nombre = $request->get("Nombre");
        $proveedor->tipo_documento = "DNI";
        $proveedor->num_documento = $request->get("Documento");
        $proveedor->direccion = $request->get("Direccion");
        $proveedor->telefono = $request->get("Telefono");
        $proveedor->email = $request->get("Email");
        $proveedor->estado = "activo";
        $proveedor->update();

        return Response::json([
            'success'=>true
        ]);
      }



    }

    public function store(Request $request)
    {
      $key = $request->get("key");
      $consult = DB::table("persona")->select("num_documento")
      ->where("num_documento","=",$request->get("Documento"))
      ->orWhere("email",$request->get("Email"))
      ->first();


       $rules = array(
        "Tipo_Proveedor"=>"required",
          "Nombre"=>"required|string|max:40",
          "Documento"=>"required|max:8|min:8",
          "Direccion"=>"required",
          "Telefono"=>"required|max:9|min:7",
          "Email"=>"required|email|max:60"
      );

      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {

        return Response::json([
              'success'=>false,
              'error'=>$validator->errors()->toArray()
        ]);
      }else {
        if ($consult) {
          $result = array(
                    'result'=>$consult
            );
          if ($result["result"]->num_documento == $request->get("Documento")) {
             return Response::json([
                  'success'=>false,
                  'error'=>["Documento"=>"El campo Documento ya existe!."]
             ]);
          }else{

            return Response::json([
                 'success'=>false,
                 'error'=>["Email"=>"El campo Email ya existe!."]
            ]);
          }
        }

        $proveedor = new Persona();
        $proveedor->tipo_persona=$request->get("Tipo_Proveedor");
        $proveedor->nombre=$request->get("Nombre");
        $proveedor->tipo_documento="DNI";
        $proveedor->num_documento=$request->get("Documento");
        $proveedor->direccion=$request->get("Direccion");
        $proveedor->telefono=$request->get("Telefono");
        $proveedor->email=$request->get("Email");
        $proveedor->estado="activo";
        $proveedor->save();

        return Response::json([
            'success'=>true
        ]);
      }

    }
    public function destroy(Request $request, $id)
    {
      $proveedor = Persona::findOrFail($id);
      $proveedor->estado="inactivo";
      $proveedor->update();

      $message = "El Proveedor ". $proveedor->nombre. " se le dió de baja";
      return Response::json([
          'success'=>true,
          'message'=>$message
      ]);
    }
}
