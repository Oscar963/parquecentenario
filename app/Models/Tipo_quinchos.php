<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_quinchos extends Model
{
    use HasFactory;

    protected $table = 'tipo_quincho';

    public function quinchos()
    {
        return $this->hasMany(Quinchos::class, 'id');
    }
}
