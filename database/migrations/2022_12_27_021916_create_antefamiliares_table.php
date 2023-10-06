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
        Schema::create('antefamiliares', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('padron_id');
            $table->boolean('htam')->nullable();
            $table->boolean('htap')->nullable();
            $table->boolean('htah')->nullable();
            $table->boolean('cardiom')->nullable();
            $table->boolean('cardiop')->nullable();
            $table->boolean('cardioh')->nullable();
            $table->boolean('dbtm')->nullable();
            $table->boolean('dbtp')->nullable();
            $table->boolean('dbth')->nullable();
            $table->boolean('acvm')->nullable();
            $table->boolean('acvp')->nullable();
            $table->boolean('acvh')->nullable();
            $table->boolean('cacm')->nullable();
            $table->boolean('cacp')->nullable();
            $table->boolean('cach')->nullable();
            $table->boolean('carm')->nullable();
            $table->boolean('carp')->nullable();
            $table->boolean('carh')->nullable();
            $table->boolean('camm')->nullable();
            $table->boolean('camp')->nullable();
            $table->boolean('camh')->nullable();
            $table->boolean('caom')->nullable();
            $table->boolean('caop')->nullable();
            $table->boolean('caoh')->nullable();
            $table->boolean('abudm')->nullable();
            $table->boolean('abudp')->nullable();
            $table->boolean('abudh')->nullable();
            $table->boolean('abuhm')->nullable();
            $table->boolean('abuhp')->nullable();
            $table->boolean('abuhh')->nullable();
            $table->boolean('deprem')->nullable();
            $table->boolean('deprep')->nullable();
            $table->boolean('depreh')->nullable();
            $table->boolean('discam')->nullable();
            $table->boolean('discap')->nullable();
            $table->boolean('discah')->nullable();
            $table->boolean('msubm')->nullable();
            $table->boolean('msubp')->nullable();
            $table->boolean('msubh')->nullable();
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
        Schema::dropIfExists('antefamiliares');
    }
};
