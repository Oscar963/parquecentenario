<?php

namespace App\Http\Controllers;

use App\Models\Configuracion_calendario;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ConfiguracionCalendarioController extends Controller
{
        public function index()
    {
        return view('administrar_calendario');
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Configuracion_calendario $configuracion_calendario)
    {
        //
    }

    
    public function edit(Configuracion_calendario $configuracion_calendario)
    {
        //
    }

    
    public function update(Request $request, Configuracion_calendario $configuracion_calendario)
    {
        //
    }

    
    public function destroy(Configuracion_calendario $configuracion_calendario)
    {
        //
    }

    public function desactivarMes(Request $request) 
    {
        $request->validate(['mes' => 'required|integer|min:0|max:11']);

        $mesExiste = DB::table('configuracion_calendario')
            ->where('valor', $request->mes) 
            ->where('type', 'mes')
            ->exists();

        if ($mesExiste) {
            return response()->json(['message' => 'El mes ya está deshabilitado.'], 200);
        }

        Configuracion_calendario::create([
            'type' => 'mes',
            'valor' => $request->mes,
        ]);

        return response()->json(['message' => 'Mes deshabilitado exitosamente']);
    }

    public function activarMes(Request $request)
    {
        $request->validate(['mes' => 'required|integer|min:0|max:11']);

        $mesExiste = !DB::table('configuracion_calendario')
            ->where('valor', $request->mes) 
            ->where('type', 'mes') 
            ->exists();

        if ($mesExiste) {
            return response()->json(['message' => 'El mes ya está activo.'], 200);
        }

        Configuracion_calendario::where('type', 'mes')->where('valor', $request->mes)->delete();

        return response()->json(['message' => 'Mes habilitado exitosamente']);
    }

    public function desactivarDia(Request $request)
    {
        $request->validate(['dia' => 'required|date']);

        $fecha = Carbon::parse($request->dia);

        $fechaExiste = DB::table('configuracion_calendario')
            ->where('valor', $fecha->timestamp)
            ->exists(); // Asegúrate de que aquí usas el timestamp correcto

        if ($fechaExiste) {
            return response()->json(['message' => 'La fecha ya está deshabilitada.'], 200);
        }

        $fechaSinHora = $fecha->startOfDay();

        Configuracion_calendario::create([
            'type' => 'dia',
            'valor' => $fechaSinHora->timestamp,
        ]);

        return response()->json(['message' => 'Día deshabilitado exitosamente']);
    }

    public function activarDia(Request $request)
    {
        $request->validate(['dia' => 'required|date']);

        $fecha = Carbon::parse($request->dia);

        $fechaExiste = !DB::table('configuracion_calendario')
            ->where('valor', $fecha->timestamp)
            ->exists(); 

        if ($fechaExiste) {
            return response()->json(['message' => 'La fecha ya está habilitada.'], 200);
        }

        Configuracion_calendario::where('type', 'dia')->where('valor', $fecha->timestamp)->delete();

        return response()->json(['message' => 'Día habilitado exitosamente']);
    }

    public function disabledDates()
    {

        // Obtener los meses deshabilitados
        $meses = Configuracion_calendario::where('type', 'mes')->pluck('valor');

        // Obtener los días deshabilitados
        $dias = Configuracion_calendario::where('type', 'dia')->pluck('valor')->map(function ($dia) {
            // Convertir el día a un objeto Carbon y agregar un día
            return Carbon::createFromTimestamp($dia);
        });

        return response()->json([
            'meses' => $meses,
            'dias' => $dias,
        ]);
    }

}

