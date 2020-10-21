<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Datos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'Nombre_Producto' => 'Tennis Nike',
        ]);
        DB::table('productos')->insert([
            'Nombre_Producto' => 'Jersey Santos Laguna',
        ]);

        DB::table('productos')->insert([
            'Nombre_Producto' => 'Jersey Alemania',
        ]);
        DB::table('productos')->insert([
            'Nombre_Producto' => 'Jersey Bayern Munchen',
        ]);

            
}
}