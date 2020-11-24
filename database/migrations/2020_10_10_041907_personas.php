<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Personas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre',100);
            $table->integer('Edad');
            $table->string('Correo',100);
            $table->string('password',100);
            $table->enum('Tipo_Rol',['Administrador','Vendedor','Usuario']);
            $table->boolean('Verificado');       
            $table->string('url_imagen',110)->nullable(); 
            $table->timestamps();
        });
    }
 // $table->string('verification_code',1000);
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
