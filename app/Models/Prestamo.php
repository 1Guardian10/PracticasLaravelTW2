<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable=[
        'fecha_prestamo',
        'estado',
        'idcliente',
        'idlibros' ,
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function libro(){
        return $this->belongsTo(Libro::class);
    }
}
