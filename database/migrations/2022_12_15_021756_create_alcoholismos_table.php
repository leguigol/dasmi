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
        Schema::create('alcoholismos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('padron_id');
            $table->boolean('bebe',1);
            $table->boolean('critica');
            $table->boolean('tomaba');
            $table->boolean('ganas');
            $table->boolean('culpable');
            $table->boolean('mañana');
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
        Schema::dropIfExists('alcoholismos');
    }
};
