<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Comentarios;
use App\Producto;
use App\Personas;
class ComentarioUsuario extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */public $Comentarios;
     public $Producto;
    public function __construct($Comentarios, $Producto)
    {
        $this->Comentarios=$Comentarios;
        $this->Producto=$Producto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('19170067@uttcampus.edu.mx')
        ->view('emails.Comentariousuario');
    }
}
