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
        Schema::create('hcplanes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evolucion_id');
            $table->unsignedBigInteger('padron_id');
            $table->string('detalle')->nullable();
            $table->unsignedBigInteger('proceso_id');
            $table->unsignedBigInteger('problema_id');
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
        Schema::dropIfExists('hcplanes');
    }
};
