<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Reservas;
use App\Models\Quinchos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ComprobanteReservas;


class ReservasController extends Controller
{
    
    public function index()
    {   
        return view('formulario-reservas.welcome');
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {   
        //dd($request->all());

        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'rut' => ['required', 'string', 'max:12'], 
            'direccion' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'email', 'max:255'],
            'telefono' => ['required', 'numeric', 'digits_between:6,15'],
            'fecha_arriendo' => ['required', 'date'], 
            'opcion' => ['required', 'string'],
            'numero_quincho' => ['required'],
            'numero_personas' => ['required', 'integer', 'min:1'], 
            'hora' => ['required', 'date_format:H:i'],
        ]);

        // Validar si el usuario ya tiene una reserva para el día seleccionado
        $existingReservation = DB::table('reservas')
            ->where('rut', $request->post('rut'))
            ->where('fecha_arriendo', $request->post('fecha_arriendo'))
            ->exists();

        if ($existingReservation) {
            return back()->withErrors(['fecha_arriendo' => 'Ya tienes una reserva para este día.']);
        }

        // Validar si ya existe una reserva para el mismo día y número de quincho.
        $reservasDuplicadas = DB::table('reservas')
            ->where('numero_quincho', $request->post('numero_quincho'))
            ->where('fecha_arriendo', $request->post('fecha_arriendo'))
            ->exists();

        if ($reservasDuplicadas) {
            return back()->withErrors(['fecha_arriendo' => 'Lo sentimos, este quincho ya está reservado.']);
        }

        $reservas = new Reservas();

        $quinchoSeleccionado = $request->input('numero_quincho');

        $reservas->nombre = $request->post('nombre');
        $reservas->rut = $request->post('rut');
        $reservas->direccion = $request->post('direccion');
        $reservas->correo = $request->post('correo');
        $reservas->telefono = $request->post('telefono');
        $reservas->fecha_arriendo = $request->post('fecha_arriendo');
        $reservas->opcion = $request->post('opcion');
        $reservas->numero_quincho = $request->post('numero_quincho');
        $reservas->numero_personas = $request->post('numero_personas');
        $reservas->hora_arriendo = $request->post('hora');
        $reservas->id_estado = 2;
        $reservas->id_quincho = $quinchoSeleccionado;
        $reservas->save();

        Mail::to($request->correo)
         //   ->cc('reserva.quinchos@municipalidadarica.cl')
            ->send(new ComprobanteReservas([
                'nombre' => $request->nombre,
                'rut' => $request->rut,
                'direccion' => $request->direccion,
                'correo' => $request->correo,
                'telefono' => $request->telefono,
                'nQuincho' => $request->numero_quincho,
                'codigo' => $reservas->id, 
                'fecha' => $request->fecha_arriendo,
                'hora' => $request->hora,
                'idReserva' => $reservas->id,
            ]));

        return redirect()->back()->with('success', 'Reserva realizada con éxito y correo enviado.');
    }

    public function show(Reservas $reservas)
    {
        //
    }

    
    public function edit(Reservas $reservas)
    {
        //
    }

    
    public function update(Request $request, Reservas $reservas)
    {
        //
    }

    
    public function destroy(Reservas $reservas)
    {
        //
    }

    public function formularioGratuidad(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'rut' => ['required', 'string', 'max:12'],
            'direccion' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'email', 'max:255'],
            'telefono' => ['required', 'numeric', 'digits_between:6,15'],
            'fecha_arriendo' => ['required', 'date'],
            'quinchos' => ['required', 'array'], // Acepta un arreglo de quinchos
            'numero_personas' => ['required', 'integer', 'min:1'],
            'hora' => ['required', 'date_format:H:i'],
        ]);

        // Obtener el array de quinchos y filtrar duplicados
        $quinchos = array_unique($request->input('quinchos'));

        // Guardar cada reserva
        foreach ($quinchos as $quinchoId) {
            // Buscar el quincho en la base de datos
            $quincho = Quinchos::where('numero_quincho', $quinchoId)->first();

            if ($quincho) { // Verifica si se encontró el quincho
                Reservas::create([
                    'numero_quincho' => $quinchoId,
                    'nombre' => $request->nombre,
                    'rut' => $request->rut,
                    'direccion' => $request->direccion,
                    'correo' => $request->correo,
                    'telefono' => $request->telefono,
                    'fecha_arriendo' => $request->fecha_arriendo,
                    'hora_arriendo' => $request->hora,
                    'numero_personas' => $request->numero_personas,
                    'opcion' => $quincho->id_tipo_quincho,
                    'id_estado' => 2,
                    'id_quincho' => (int) $quinchoId,
                ]);
            }
        }

        // Preparar la lista de quinchos reservados para el correo
        $quinchosReservados = implode(', ', $quinchos);

        // Enviar correo de confirmación de la reserva
        Mail::to($request->correo)
         //   ->cc('reserva.quinchos@municipalidadarica.cl')
            ->send(new ComprobanteReservas([
                'nombre' => $request->nombre,
                'rut' => $request->rut,
                'direccion' => $request->direccion,
                'correo' => $request->correo,
                'telefono' => $request->telefono,
                'nQuincho' => $quinchosReservados,
                'codigo' => null,
                'fecha' => $request->fecha_arriendo,
                'hora' => $request->hora,
                'idReserva' => null,
            ]));

        return redirect()->back()->with('success', 'Reserva realizada con éxito y correo enviado.');
    }


    public function validarReserva(Request $request)
    {
        $rut = $request->input('rut');
        $fechaArriendo = $request->input('fecha_arriendo');

        $reservaExistente = Reservas::where('rut', $rut)
            ->whereDate('fecha_arriendo', $fechaArriendo)
            ->exists();

        return response()->json(['disponible' => !$reservaExistente]);
    }

    public function ValidarReservasDuplicadas(Request $request)
    {
        $numeroQuincho = $request->input('numero_quincho');
        $fechaArriendo = $request->input('fecha_arriendo');

        $reservasDuplicadas = Reservas::where('numero_quincho', $numeroQuincho)
            ->whereDate('fecha_arriendo', $fechaArriendo)
            ->exists();

        return response()->json([
            'disponible' => !$reservasDuplicadas,  // Si no hay reservas duplicadas, está disponible
            'mensaje' => $reservasDuplicadas ? 'El quincho ya está reservado en esta fecha.' : 'El quincho está disponible para reservar.'
        ]);
    }

    public function disponibilidadDia(Request $request)
    {
        $fechaArriendo = $request->input('fecha_arriendo');

        // Convertir la fecha de arriendo a una marca de tiempo comparable
        $timestampFechaArriendo = strtotime($fechaArriendo);

        // Buscar en la base de datos si la fecha está deshabilitada
        $fechaInhabilitada = DB::table('configuracion_calendario')
            ->where('type', 'dia')
            ->where('valor', $timestampFechaArriendo)
            ->exists();

        if ($fechaInhabilitada) {
            return response()->json(['disponible' => false, 'message' => 'El día no está disponible para reserva.']);
        } else {
            return response()->json(['disponible' => true]);
        }
    }

    public function getDisponibles(Request $request)
    {
        $fechaArriendo = $request->input('fecha_arriendo');
        $tipoQuincho = $request->input('tipo_quincho');

        $quinchosDisponibles = Quinchos::where('id_tipo_quincho', $tipoQuincho)
            ->whereNotIn('id', function ($query) use ($fechaArriendo) {
                $query->select('id_quincho')
                    ->from('reservas')
                    ->whereDate('fecha_arriendo', $fechaArriendo);
            })
            ->get(['id', 'numero_quincho','accesibilidad']);

        return response()->json($quinchosDisponibles);
    }
}
