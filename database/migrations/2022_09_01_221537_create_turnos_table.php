<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('medico_id');
            $table->unsignedBigInteger('centro_id');
            $table->datetime('fechahora');
            $table->unsignedBigInteger('padron_id')->nullable();
            $table->string('asistio',1)->nullable();
            $table->datetime('horallega')->nullable();
            $table->string('disponible',1)->nullable();
            $table->string('telefono')->nullable();
            $table->string('observa')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('medico_id')->references('id')->on('medicos');
            $table->foreign('centro_id')->references('id')->on('centros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turnos');
    }
};
