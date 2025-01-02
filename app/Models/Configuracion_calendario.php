<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracion_calendario extends Model
{
    use HasFactory;

    protected $table = 'configuracion_calendario';

    protected $fillable = ['type', 'valor'];
}
