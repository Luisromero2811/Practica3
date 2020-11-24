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
                 'password'=>Hash::make('123456'),
                 'Verificado'=>true,
                'url_imagen'=>NULL]);
        $Persona=factory(App\Personas::class,5)->create();
    }
}
