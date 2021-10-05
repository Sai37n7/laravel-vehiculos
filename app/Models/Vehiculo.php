<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'clave',
        'tipo',
        'velmax',
        'velmin',
        'conductor',
        'inicio_uso',
        'fin_uso',
        'ubicacion',
    ];
}
