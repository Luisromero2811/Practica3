<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Personas;
use App\personal_access_tokens;
class Permisoaceptado extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $Personas;
    public function __construct($Personas)
    {
        $this->Personas=$Personas;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('19170067@uttcampus.edu.mx')
        ->view('emails.Permisoaccept');
        
    }
}/*módulo para guardar foto de perfil, 
al poner un comentario mandar correo al administrador de quién lo hizo y notificar al usuario que lo hizo la
propia acción
