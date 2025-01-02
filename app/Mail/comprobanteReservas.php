<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class comprobanteReservas extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $rut;
    public $direccion;
    public $correo;
    public $telefono;
    public $nQuincho;
    public $codigo;
    public $fecha;
    public $hora;
    public $idReserva;

    public function __construct($data)
    {
        $this->nombre = $data['nombre'];
        $this->rut = $data['rut'];
        $this->direccion = $data['direccion'];
        $this->correo = $data['correo'];
        $this->telefono = $data['telefono'];
        $this->nQuincho = $data['nQuincho'];
        $this->codigo = $data['codigo'];
        $this->fecha = $data['fecha'];
        $this->hora = $data['hora'];
        $this->idReserva = $data['idReserva'];
    }


    public function build()
    {
        return $this->view('mail.reserva_mail')
            ->subject('Reserva de quincho Nº ' . $this->nQuincho . ' para el día ' . $this->fecha . ' a las ' . $this->hora);
           // ->from('centenario@municipalidadarica.cl', 'Parque Centenario IMA');
    }
}
