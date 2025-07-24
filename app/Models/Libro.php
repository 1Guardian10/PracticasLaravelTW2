<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'titulo',
        'autor',
        'editorial',
        'anio',
        'fecha_publicacion',
        'DOI',
        'estado',
        'categoria',
        'imagen'
    ];
    
    public function prestamo(){
        return $this->hasMany(Prestamo::class);
    }
}
