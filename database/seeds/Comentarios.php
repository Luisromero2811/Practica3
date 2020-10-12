<?php

use Illuminate\Database\Seeder;

class Comentarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comentarios')->insert([
            'id' => '7',
            'Comentarios'=>'Talla #9',
            'id_producto'=>'1',
             'Nombre_Usuario'=>'Ángel Dávila']);
             DB::table('comentarios')->insert([
                'id' => '8',
                'Comentarios'=>'23 Jersey Manga larga',
                'id_producto'=>'2',
                 'Nombre_Usuario'=>'Ezequiel Rodríguez']);
       }
}
