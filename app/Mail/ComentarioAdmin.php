<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Producto;
use App\Personas;
class ComentarioAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $Persona;
    public $Producto;
    public function __construct($Persona, $Producto)
    {
        $this->Persona=$Persona;
        $this->Producto=$Producto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('luisvazquezromero28@gmail.com')
        ->view('emails.Comentarioadmin');
    }
}
