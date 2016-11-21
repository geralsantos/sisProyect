<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    //
protected $table = "marca";
protected $primaryKey = "idmarca";
public $timestamps=false;
protected $fillable=[
    "nombre_marca"
];
protected $guarded=[

];
}
