<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    use HasFactory;

    public function reservas()
    {
        return $this->hasMany(Reservas::class, 'id');
    }
}
