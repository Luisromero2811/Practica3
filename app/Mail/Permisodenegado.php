<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Personas;
class Permisodenegado extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $permiso;
    public string $accion;
    public function __construct(Personas $permiso, $accion)
    {
    $this->permiso=$permiso; 
    $this->accion=$accion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('luisvazquezromero28@gmail.com')
        ->view('emails.Permisodenied');
    }
}