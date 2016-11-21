<?php
use Yajra\Datatables\Facades\Datatables;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
//Route::auth();

//cerrar sesion
Route::get('auth/logout', 'Auth\AuthController@logout');
//home example
Route::get('/home', 'HomeController@index');
Route::get('reportes/ingresos','ReporteIngresosController@index');

Route::get('reportes/ingresos/{fecha}','ReporteIngresosController@Ingresos');

//Route::post('reportes/ingresos/{fecha}','ReporteIngresosController@TotalIngresos' );

//solo los autenticados y administradores entran
Route::group(['middleware' => ['auth','admin']], function () {

  Route::get('/', function () {
      return view('layouts/dashboard');
  });

  //---------------------------------------Categoria-----------------------------------------------------//
  Route::match(array('GET','POST'),'almacen/categoria/submit','CategoriaController@store');
  //Route::match(array('GET','POST'),'almacen/categoria/update/{id}','CategoriaController@update');
  Route::match(array('GET','POST'),'almacen/categoria/dataload',function(){
      return Datatables::eloquent(app\Categoria::query()->where("condicion","=","1"))->make(true);
      //return Datatables::queryBuilder(DB::table('categoria')->where("condicion","=","1"))->make(true);

  });
  Route::match(array('GET','POST'),'almacen/categoria/{id}','CategoriaController@update');

  Route::match(array('GET','POST'),'almacen/categoria/edit/{id}','CategoriaController@edit');
  Route::get('almacen/categoria/create','CategoriaController@create');
  Route::resource('almacen/categoria','CategoriaController');
  Route::resource('compras/proveedor','ProveedorController');

  //---------------------------------------Articulo-----------------------------------------------------//

  Route::match(array('GET','POST'),'almacen/articulo/dataload',function(){
    return Datatables::eloquent(app\Articulo::query()->where("estado","=","Activo"))->make(true);
     //return Datatables::queryBuilder(DB::table('articulo')->where("estado","=","Activo"))->make(true);

  });

  Route::get('almacen/articulo/articulotoproveedor/create/{key}',[
        'as'=>'almacen.articulo.articulotoproveedor.create',
        'uses'=>'ArticuloController@fromArticulo_toProveedor'

  ]);
  Route::match(array('GET','POST'),'almacen/articulo/submit','ArticuloController@store');
  Route::get('almacen/articulo','ArticuloController@index');

  Route::match(array('GET','POST'),'almacen/articulo/edit/{id}','ArticuloController@edit');
  Route::resource('almacen/articulo/create','ArticuloController@create');
  Route::resource('almacen/articulo','ArticuloController');

  //---------------------------------------Ingresos-----------------------------------------------------//
  Route::match(array('GET','POST'),'compras/ingresos/dataload',function(){
    return Datatables::eloquent(
          app\Ingresos::query()->join('persona','ingreso.idproveedor','=','persona.idpersona')
                        ->join('comprobante','ingreso.idcomprobante','=','comprobante.serie')
                        ->select('ingreso.idingreso as idingreso','persona.tipo_persona as tipo_persona',
                                 DB::raw("CONCAT(comprobante.tipo ,': ', comprobante.serie,'-', ingreso.num_comprobante) as tipo"),
                                 'ingreso.fecha_hora as fecha_hora',
                                 'ingreso.impuesto as impuesto','ingreso.estado as estado')
                                 ->whereIn('persona.tipo_persona',["Servicios","Bienes","Recursos"]))->make(true);
     //return Datatables::queryBuilder(DB::table('articulo')->where("estado","=","Activo"))->make(true);

  });
  Route::match(array('GET','POST'),'compras/ingresos/create/articulo/dataload',function(){
    return Datatables::eloquent(app\Articulo::query()
                            ->join('marca','marca.idmarca',"=","articulo.idmarca")
                            ->join('categoria','categoria.idcategoria',"=","articulo.idcategoria")
                            ->select('articulo.idarticulo as idarticulo','articulo.codigo as codigo','articulo.nombre as nombre','articulo.stock as stock','articulo.stock_minimo as stock_minimo','articulo.precio_venta as precio_venta','articulo.precio_compra as precio_compra','marca.nombre_marca as nombre_marca','categoria.nombre_categoria as nombre_categoria'))->make(true);

  });
  Route::match(array("GET","POST"),'compras/ingresos/submit',[
          'as'=> "compras.ingresos.submit",
          'uses'=> "IngresosController@store"
  ]);
  Route::get('compras/ingresos/to_proveedor/create/{key}',[
        'as'=>'compras.ingresos.to_proveedor.create',
        'uses'=>'IngresosController@fromIngreso_toProveedor'

  ]);
  Route::get("compras/ingresos/detalle/{id}","DetalleIngresoController@detail");
  Route::match(array('GET','POST'),'compras/ingresos/edit/{id}','IngresosController@edit');
  Route::resource('compras/ingresos','IngresosController');

   //---------------------------------------Proveedores-----------------------------------------------------//
  Route::post("compras/proveedor/update/{id}",[
      'as'=>"compras.proveedor.update",
      'uses'=>"ProveedorController@update"

  ]);
  Route::get("compras/proveedor/show/{id}","ProveedorController@show");
  Route::get("compras/proveedor/create",[
    'as'=>'compras.proveedor.create',
    'uses'=>'ProveedorController@create'
  ]);

  Route::get('compras/proveedor/destroy/{id}',[
    'as'=>'compras.proveedor.destroy',
    'uses'=>'ProveedorController@destroy'
  ]);

  Route::resource("compras/proveedor",'ProveedorController');

  //Route::get('/home', 'HomeController@index');


});
