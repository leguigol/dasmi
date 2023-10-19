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
        Schema::create('vacunas_pacientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vacuna_id');
            $table->string('vacuna_value',1);
            $table->unsignedBigInteger('padron_id');
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
        Schema::dropIfExists('vacunas_pacientes');
    }
};
