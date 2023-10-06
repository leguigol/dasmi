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
        Schema::create('evoluciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('padron_id');
            $table->date('fecha');
            $table->string('subjetivo');
            $table->string('objetivo');
            $table->unsignedBigInteger('medico_id');
            $table->unsignedBigInteger('centro_id');
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
        Schema::dropIfExists('evoluciones');
    }
};
