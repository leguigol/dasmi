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
        Schema::create('anteginecologicos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('padron_id');
            $table->string('menarca')->nullable();
            $table->string('irs')->nullable();
            $table->string('ritmo')->nullable();
            $table->string('fum')->nullable();
            $table->string('pap')->nullable();
            $table->string('mx')->nullable();
            $table->string('mac')->nullable();
            $table->string('g')->nullable();
            $table->string('a')->nullable();
            $table->string('p')->nullable();
            $table->string('c')->nullable();
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
        Schema::dropIfExists('anteginecologicos');
    }
};
