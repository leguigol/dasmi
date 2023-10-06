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
        Schema::create('drogas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('padron_id');
            $table->boolean('droga');
            $table->boolean('inyecta');
            $table->string('cuales')->nullable();
            $table->boolean('fisica');
            $table->string('veces')->nullable();
            $table->string('diuresis')->nullable();
            $table->string('catarsis')->nullable();
            $table->string('sueño')->nullable();
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
        Schema::dropIfExists('drogas');
    }
};
