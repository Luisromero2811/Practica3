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
    
}
}