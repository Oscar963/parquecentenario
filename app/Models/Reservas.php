<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;

    // Definir los campos que pueden ser llenados masivamente
    protected $fillable = [
        'nombre',
        'rut',
        'direccion',
        'correo',
        'telefono',
        'fecha_arriendo',
        'opcion',
        'numero_personas',
        'hora_arriendo',
        'numero_quincho',
        'id_estado',
        'id_quincho',
    ];

    // Relación con la tabla de estados
    public function estados()
    {
        return $this->belongsTo(Estados::class, 'id_estado');
    }

    // Relación con la tabla de quinchos
    public function quinchos()
    {
        return $this->belongsTo(Quinchos::class, 'id_quincho');
    }
}
