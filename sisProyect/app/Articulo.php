<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{

  //referencia a la tabla y primary
  protected $table='articulo';
  protected $primaryKey='idarticulo';

  //false = no adicionar 2 columnas de creacion y actualizado del nuevo registro
  public $timestamps=false;

  //campos que van a recibir un valor y almacenarlos en la bd
  protected $fillable=
  [
      'idcategoria',
      'idpersona',
        'codigo',
        'nombre',
        'stock',
        'descripcion',
        'imagen',
        'estado',
        'precio_venta',
        'stock_minimo',
        'idmarca',
        'precio_compra'


    ];

protected $guarded=
        [

        ];

}
