<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //referencia a la tabla y primary
    protected $table='categoria';
    protected $primaryKey='idcategoria';

    //false = no adicionar 2 columnas de creacion y actualizado del nuevo registro
    public $timestamps=false;

    //campos que van a recibir un valor y almacenarlos en la bd
    protected $fillable=
    [
      'nombre_categoria',
      'condicion',
        'descripcion'
    ];

    //especifica que campos no queremos asignar al modelo
    protected $guarded=
    [

    ];
}
