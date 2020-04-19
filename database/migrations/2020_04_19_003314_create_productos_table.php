<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('idProducto');

            $table->string('nombre');
            $table->string('color');
            $table->integer('cantidad');
            $table->float('precio');
            $table->string('categoria');
            $table->string('descripcion');
            $table->string('material');
            $table->string('modelo');
            $table->string('foto');

            $table->timestamps();
        });


    }

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
