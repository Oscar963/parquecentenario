<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReservasExport implements FromView
{
    protected $reservas;

    // Constructor para recibir los datos filtrados
    public function __construct($reservas)
    {
        $this->reservas = $reservas;
    }

    // Método para pasar la vista y los datos a exportar
    public function view(): View
    {
        return view('excel.exportReservas', [
            'reservas' => $this->reservas
        ]);
    }
}
