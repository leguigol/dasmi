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
        Schema::create('factores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('padron_id');
            $table->boolean('hta')->nullable();
            $table->boolean('dbt')->nullable();
            $table->boolean('ob')->nullable();
            $table->boolean('sbp')->nullable();
            $table->boolean('tbq')->nullable();
            $table->boolean('emb')->nullable();
            $table->boolean('cns')->nullable();
            $table->boolean('dlp')->nullable();
            $table->boolean('pps')->nullable();            
            $table->boolean('rcv1')->nullable();
            $table->boolean('rcv2')->nullable();
            $table->boolean('rcv3')->nullable();
            $table->boolean('rcv4')->nullable();
            $table->boolean('rcv5')->nullable();
            $table->boolean('asma')->nullable();
            $table->boolean('alergia')->nullable();
            $table->boolean('anom')->nullable();
            $table->boolean('ear')->nullable();
            $table->boolean('pediatrico')->nullable();
            $table->boolean('vih')->nullable();
            $table->boolean('hipert')->nullable();
            $table->boolean('hipot')->nullable();
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
        Schema::dropIfExists('factores');
    }
};
