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
        $Persona=factory(App\Personas::class,5)->create();
    }
}
