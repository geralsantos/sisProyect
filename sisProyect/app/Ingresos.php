<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Ingresos extends Model
{
    //
    protected $table='ingreso';
    public $timestamps=false;
    protected $primaryKey='idingreso';

    protected $fillable=[
        'idproveedor',
        'idcomprobante',
        'num_comprobante',
        'fecha_hora',
        'impuesto',
        'estado'
    ];

    protected $guarded=[];
}
