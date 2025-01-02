<?php

namespace App\Http\Controllers;

use App\Models\Tipo_usuarios;
use App\Models\Reservas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use \Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ReservasExport;
use Maatwebsite\Excel\Facades\Excel;

class TipoUsuariosController extends Controller
{
    public function index()
    {
        // Obtener la fecha actual
        $fechaActual = Carbon::today()->format('Y-m-d');  // Formatea la fecha como 'YYYY-MM-DD'

        // Filtrar las reservas de la fecha actual y que solo sean quinchos reservados
        $datos = Reservas::whereDate('fecha_arriendo', $fechaActual)
        ->where('id_estado', 2)
        ->get();

        // Retornar la vista con los datos
        return view('administracion.privada', compact('datos'));
    }


    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Tipo_usuarios $tipo_usuarios)
    {
        //
    }

    
    public function edit(Tipo_usuarios $tipo_usuarios)
    {
        //
    }

   
    public function update(Request $request, Tipo_usuarios $tipo_usuarios)
    {
        //
    }

    
    public function destroy(Tipo_usuarios $tipo_usuarios)
    {
        //
    }

    public function filtrarPorFecha(Request $request)
    {
        // Inicializa la consulta
        $query = Reservas::where('id_estado', 2); // Aplica el filtro por estado al inicio

        // Si no se proporciona una fecha, establece la fecha actual
        if (!$request->input('fecha_arriendo')) {
            $fechaActual = Carbon::now()->format('Y-m-d');
            $query->whereDate('fecha_arriendo', $fechaActual);
        } else {
            // Filtrar por fecha de arriendo si está presente
            try {
                $fechaFormateada = Carbon::createFromFormat('d/m/Y', $request->input('fecha_arriendo'))->format('Y-m-d');
                $query->whereDate('fecha_arriendo', $fechaFormateada);
            } catch (\Exception $e) {
                \Log::error('Error al formatear la fecha: ' . $e->getMessage());
            }
        }

        // Filtrar por número de quincho si está presente
        if ($request->input('quincho')) {
            $query->where('numero_quincho', $request->input('quincho'));
        }

        // Filtrar por RUT si está presente
        if ($request->input('rut')) {
            $query->where('rut', 'like', '%' . $request->input('rut') . '%');
        }

        // Filtrar por nombre si está presente
        if ($request->input('nombre')) {
            $query->where('nombre', 'like', '%' . $request->input('nombre') . '%');
        }

        // Filtrar por hora de llegada si está presente
        if ($request->input('hora')) {
            $query->where('hora_arriendo', $request->input('hora'));
        }

        // Ejecutar la consulta y obtener los resultados
        $datos = $query->get();

        // Retorna la vista con los datos filtrados
        return view('administracion.privada', compact('datos'));
    }

    public function cambiarEstado(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'id' => 'required|integer|exists:reservas,id', // Validar que el ID de la reserva exista
            'estado' => 'required|string|in:checkIn,checkOut,Anular' // Validar el estado
        ]);

        // Buscar la reserva por ID
        $reserva = Reservas::find($request->id);

        if ($reserva) {
            // Cambiar el estado dependiendo de la opción seleccionada
            switch ($request->estado) {
                case 'checkIn':
                    $reserva->id_estado = 3; // Ocupado
                    break;
                case 'checkOut':
                    $reserva->id_estado = 1; // Disponible
                    break;
                case 'Anular':
                    $reserva->id_estado = 1; // Disponible
                    break;
            }

            // Guardar el cambio de estado en la base de datos
            $reserva->save();

            // Retornar una respuesta de éxito
            return response()->json(['message' => 'Estado actualizado correctamente'], 200);
        }

        // Si no se encuentra la reserva, retornar un error
        return response()->json(['error' => 'Reserva no encontrada'], 404);
    }

    public function historial(Request $request)
    {
        // Inicializamos la consulta base
        $query = Reservas::where('id_estado', 3)->orderBy('updated_at', 'desc');

        // Filtrar por fecha de arriendo si está presente
        if ($request->filled('fecha_arriendo')) {
            try {
                $fechaFormateada = Carbon::createFromFormat('d/m/Y', $request->input('fecha_arriendo'))->format('Y-m-d');
                $query->whereDate('fecha_arriendo', $fechaFormateada);
            } catch (\Exception $e) {
                \Log::error('Error al formatear la fecha: ' . $e->getMessage());
            }
        }

        // Filtrar por número de quincho si está presente
        if ($request->filled('quincho')) {
            $query->where('numero_quincho', $request->input('quincho'));
        }

        // Filtrar por RUT si está presente
        if ($request->filled('rut')) {
            $query->where('rut', 'like', '%' . $request->input('rut') . '%');
        }

        // Filtrar por nombre si está presente
        if ($request->filled('nombre')) {
            $query->where('nombre', 'like', '%' . $request->input('nombre') . '%');
        }

        // Filtrar por hora de llegada si está presente
        if ($request->filled('hora')) {
            $query->where('hora_arriendo', $request->input('hora'));
        }

        // Finalmente ejecutamos la consulta y obtenemos los resultados
        $datos = $query->get();

        // Retornamos la vista con los datos filtrados o completos
        return view('administracion.historial', compact('datos'));
    }

    public function verificarEstado(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer|exists:reservas,id',
        ]);

        // Buscar la reserva por ID
        $reserva = Reservas::find($validated['id']);

        // Verificar el estado del quincho
        if ($reserva->id_estado == 1) {
            return response()->json(['error' => 'El quincho ya está disponible.'], 400);
        }

        return response()->json(['message' => 'El quincho está reservado y puede realizar el check-in.'], 200);
    }

    public function generarPDF(Request $request)
    {
        // Inicializa la consulta para las reservas
        $query = Reservas::where('id_estado', 2);

        // Filtrar por fecha de arriendo si está presente
        if ($request->filled('fecha_arriendo')) {
            try {
                // Formatea la fecha de entrada
                $fechaFormateada = Carbon::createFromFormat('d/m/Y', $request->input('fecha_arriendo'))->format('Y-m-d');
                $query->whereDate('fecha_arriendo', $fechaFormateada);
                // Almacena la fecha para pasarla a la vista
                $fechaParaVista = Carbon::parse($fechaFormateada)->format('d/m/Y');
            } catch (\Exception $e) {
                \Log::error('Error al formatear la fecha: ' . $e->getMessage());
                return back()->withErrors(['fecha_arriendo' => 'La fecha ingresada no es válida.']);
            }
        } else {
            // Si no se proporciona una fecha, usa la fecha actual
            $fechaActual = Carbon::today()->format('Y-m-d');
            $query->whereDate('fecha_arriendo', $fechaActual);
            $fechaParaVista = Carbon::today()->format('d/m/Y');
        }

        // Obtén los datos filtrados
        $datos = $query->get();

        // Cargar la vista y generar el PDF, pasando la fecha
        $pdf = PDF::loadView('pdf.reservas_pdf', compact('datos', 'fechaParaVista'));
        return $pdf->download('reporte_reservas.pdf');
    }

    public function generarPDFHistorico(Request $request) {

        $query = Reservas::where('id_estado', 3)->orderBy('updated_at', 'desc');

        // Filtrar por fecha de arriendo si está presente
        if ($request->filled('fecha_arriendo')) {
            try {
                // Formatea la fecha de entrada
                $fechaFormateada = Carbon::createFromFormat('d/m/Y', $request->input('fecha_arriendo'))->format('Y-m-d');
                $query->whereDate('fecha_arriendo', $fechaFormateada);
                // Almacena la fecha para pasarla a la vista
                $fechaParaVista = Carbon::parse($fechaFormateada)->format('d/m/Y');
            } catch (\Exception $e) {
                \Log::error('Error al formatear la fecha: ' . $e->getMessage());
                return back()->withErrors(['fecha_arriendo' => 'La fecha ingresada no es válida.']);
            }
        } else {
            // Si no se proporciona una fecha, usa la fecha actual
            $fechaActual = Carbon::today()->format('Y-m-d');
            $query;
            $fechaParaVista = Carbon::today()->format('d/m/Y');
        }

        // Obtén los datos filtrados
        $datos = $query->get();

        // Cargar la vista y generar el PDF, pasando la fecha
        $pdf = PDF::loadView('pdf.historico_reservas_pdf', compact('datos', 'fechaParaVista'));
        return $pdf->download('historico_reporte_reservas.pdf');
    }

    public function generarPDFespecifico($id) {
        // Intenta recuperar la reserva por ID
        $reserva = Reservas::find($id);

        // Verifica si la reserva existe
        if (!$reserva) {
            return redirect()->back()->withErrors('Reserva no encontrada');
        }

        // Puedes formatear la fecha para la vista
        $fechaParaVista = Carbon::parse($reserva->fecha_arriendo)->format('d/m/Y');

        // Cargar la vista con la reserva específica
        $pdf = PDF::loadView('pdf.reserva_especifica_pdf', compact('reserva', 'fechaParaVista'));
        return $pdf->download('reporte_reserva_' . $id . '.pdf');
    }

    public function modificarCalendario() {
        return (view('administracion.administrar_calendario'));
    }

    public function exportar(Request $request)
    {
        // Inicializa la consulta para filtrar las reservas
        $query = Reservas::query();

        $fechaFormateada = null;

        // Si no se proporciona una fecha, establece la fecha actual
        if (!$request->input('fecha_arriendo')) {
            $fechaActual = Carbon::now()->format('d-m-Y');
            $query->whereDate('fecha_arriendo', $fechaActual);
        } else {
            // Filtrar por fecha de arriendo si está presente
            try {
                $fechaFormateada = Carbon::createFromFormat('d/m/Y', $request->input('fecha_arriendo'))->format('Y-m-d');
                $query->whereDate('fecha_arriendo', $fechaFormateada);
            } catch (\Exception $e) {
                \Log::error('Error al formatear la fecha: ' . $e->getMessage());
            }
        }

        // Obtener los datos filtrados
        $reservasFiltradas = $query->get();

        // Generar el nombre del archivo
        $nombreArchivo = 'reservas_dia_' . ($fechaFormateada ? $fechaFormateada : $fechaActual) . '.xlsx';

        // Exportar utilizando la clase personalizada que recibe los datos filtrados
        return Excel::download(new ReservasExport($reservasFiltradas), $nombreArchivo);
    }

    public function exportarHistorial(Request $request)
    {
        // Inicializa la consulta para filtrar las reservas con id_estado = 3
        $query = Reservas::where('id_estado', 3);

        $fechaFormateada = null;

        // Filtrar por fecha de arriendo solo si está presente
        if ($request->filled('fecha_arriendo')) {
            try {
                $fechaFormateada = Carbon::createFromFormat('d/m/Y', $request->input('fecha_arriendo'))->format('Y-m-d');
                $query->whereDate('fecha_arriendo', $fechaFormateada);
            } catch (\Exception $e) {
                \Log::error('Error al formatear la fecha: ' . $e->getMessage());
            }
        }

        // Obtener los datos filtrados
        $reservasFiltradas = $query->get();

        // Generar el nombre del archivo
        $nombreArchivo = 'reservas_dia_' . ($fechaFormateada ? $fechaFormateada : 'todas') . '.xlsx';

        // Exportar utilizando la clase personalizada que recibe los datos filtrados
        return Excel::download(new ReservasExport($reservasFiltradas), $nombreArchivo);
    }
}
