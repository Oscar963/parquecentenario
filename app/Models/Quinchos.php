<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quinchos extends Model
{
    use HasFactory;

    public function tipo_quincho()
    {
        return $this->belongsTo(Tipo_quinchos::class, 'id_tipo_quincho');

    }

    public function reservas()
    {
        return $this->hasMany(Reservas::class, 'id_quincho');
    }
}
