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
        Schema::create('antecedentes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('padron_id');
            $table->boolean('hta');
            $table->boolean('dbt');
            $table->boolean('tbc');
            $table->boolean('asma');
            $table->boolean('epoc');
            $table->boolean('alergia');
            $table->boolean('reuma');
            $table->boolean('ets');
            $table->string('otros');
            $table->boolean('acv');
            $table->boolean('am');
            $table->boolean('hiv');
            $table->boolean('chagas');
            $table->boolean('tumores');
            $table->boolean('psiquiatrico');
            $table->boolean('neurologico');
            $table->boolean('relaciones');
            $table->boolean('alergiamedica');
            $table->string('cuales')->nullable();
            $table->string('interna1')->nullable();
            $table->string('interna2')->nullable();
            $table->string('interna3')->nullable();
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
        Schema::dropIfExists('antecedentes');
    }
};
