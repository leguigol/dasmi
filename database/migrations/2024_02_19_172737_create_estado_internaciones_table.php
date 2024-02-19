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
        Schema::create('estado_internaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('internacion_id');
            $table->string('tipo',1);
            $table->date('fecha_desde');
            $table->date('fecha_hasta')->nullable();
            $table->string('estado');
            $table->text('observaciones');
            $table->unsignedBigInteger('auditor_id')->nullable();
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
        Schema::dropIfExists('estado_internaciones');
    }
};
