<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaLibroPrestamo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro_prestamo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('usuario_id');
            $table->foreign('usuario_id', 'fk_libropretamo_usuario')->references('id')->on('usuario')->ondelete('restrict')->onupdate('restrict');
            $table->unsignedInteger('libro_id');
            $table->foreign('libro_id', 'fk_libropretamo_libro')->references('id')->on('libro')->ondelete('restrict')->onupdate('restrict');
            $table->date('fecha_prestamo');
            $table->string('prestamo_a',100);
            $table->date('fecha_devolucion')->nullable();
            $table->boolean('estado');

            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation= 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libro_prestamo');
    }
}
