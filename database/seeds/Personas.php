<?php

use Illuminate\Database\Seeder;

class Personas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personas')->insert([
                'Nombre'=>'Luis Romero',
                'Edad'=>'20',
                'Correo'=>'luisrom28@gmail.com',
                 'password'=>'123456']);

        $Persona=factory(App\Personas::class,5)->create();
    }
}
