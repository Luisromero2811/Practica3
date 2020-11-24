<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\Correocontroller;
use App\Personas;
class Registro extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $usuario;
    public function __construct(Personas $usuario)
    {
        $this->usuario=$usuario;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('luisvazquezromero28@gmail.com')
                    ->view('emails.confirmation_code');
    }
}
/*
 return $this->from('example@example.com')
                ->view('emails.orders.shipped');