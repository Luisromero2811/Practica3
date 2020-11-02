<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class Comentarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $Comentario=factory(App\Comentarios::class,15)->create();      
       }
}
//$faker=Faker::create();
  //      foreach(range(1,15)as $index){
    //        DB::table('productos')->insert([
      //          'Nombre_Producto' =>$faker->sentence(5),
        //    ]);
          //  DB::table('comentarios')->insert([
            //    'id' => '2',
              //  'Comentarios'=>'23 Jersey Manga larga',
                //'id_producto'=>'2',
                 //'Nombre_Usuario'=>'Ezequiel Rodríguez']);

   // $planes->auditorias()->save(factory(\App\Models\Auditoria::class)->make());