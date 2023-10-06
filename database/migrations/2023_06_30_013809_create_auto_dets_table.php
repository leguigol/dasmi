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
        Schema::create('auto_dets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('autocab_id');
            $table->unsignedBigInteger('practica_id');
            $table->unsignedBigInteger('cantidad');
            $table->decimal('coseguro');
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
        Schema::dropIfExists('auto_dets');
    }
};
