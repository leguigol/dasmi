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
        Schema::create('internaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('centro_id');
            $table->unsignedBigInteger('padron_id');
            $table->unsignedBigInteger('prestador_id');
            $table->datetime('fechahora');
            $table->date('fecha_ingreso');
            $table->string('hora_ingreso',5);
            $table->string('medico');
            $table->string('tipo_internacion',2);
            $table->string('servicio',2);
            $table->string('diagnostico');
            $table->text('observaciones');
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
        Schema::dropIfExists('internaciones');
    }
};
