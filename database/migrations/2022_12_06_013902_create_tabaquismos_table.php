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
        Schema::create('tabaquismos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('padron_id');
            $table->text('fuma',1);
            $table->date('desdefuma')->nullable();
            $table->text('canti')->nullable();
            $table->boolean('nunca')->nullable();
            $table->boolean('dejo')->nullable();
            $table->date('desdedejo')->nullable();
            $table->text('minutos')->nullable();
            $table->text('piensa',1);
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
        Schema::dropIfExists('tabaquismos');
    }
};
