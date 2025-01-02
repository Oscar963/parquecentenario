<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reservas;
use Carbon\Carbon;

class CheckInTimeout extends Command
{
    // Nombre del comando de Artisan
    protected $signature = 'quincho:check-in-timeout';

    // Descripción del comando
    protected $description = 'Cambiar estado quincho';

    // Ejecutar el comando
    public function handle()
    {
        $now = now();
        $formattedNow = $now->toDateTimeString(); // Obtiene la fecha y hora actual en formato 'Y-m-d H:i:s'

        // Actualiza el estado a "Disponible" solo para las reservas "Reservadas" cuya fecha ya pasó
        Reservas::where('id_estado', 2)  // Solo las reservas "Reservadas"
            ->where(function ($query) use ($formattedNow) {
                $query->where('fecha_arriendo', '<', now()->toDateString())  // Si la fecha de arriendo es anterior a hoy
                    ->orWhere(function ($query) use ($formattedNow) {
                        $query->where('fecha_arriendo', now()->toDateString())  // Si la fecha de arriendo es hoy
                            ->whereRaw('TIMESTAMPDIFF(MINUTE, CONCAT(fecha_arriendo, " ", hora_arriendo), ?) > 1', [$formattedNow]);
                    });
            })
            ->update(['id_estado' => 1]);  // Actualiza el estado a "Disponible"
        return Command::SUCCESS;
    }
}



