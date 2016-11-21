<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    //
    protected $table = 'comprobante';
    protected $primaryKey = 'serie';
    public $timestamps=false;
    protected $fillable = [

        'tipo'
    ];
    protected $guarded=[];
}
