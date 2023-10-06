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
        Schema::create('padrones', function (Blueprint $table) {
            $table->id();
            $table->string('afiliado',20);
            $table->string('apellido',60);
            $table->string('nombres',60);
            $table->unsignedBigInteger('documento');
            $table->string('cuil',11);
            $table->string('added',1);
            $table->date('alta');
            $table->string('padron',1);
            $table->string('zona',30)->nullable();
            $table->unsignedBigInteger('titular');
            $table->date('fechanac');
            $table->string('sexo',1);
            $table->integer('parentesco_id');
            $table->date('bajapadron')->nullable();
            $table->string('estado',1);
            $table->unsignedBigInteger('plan_id');
            $table->unsignedBigInteger('convenio_id');
            $table->unsignedBigInteger('centro_id');
            $table->timestamps();

            $table->foreign('centro_id')->references('id')->on('centros')->onDelete('no action');
            $table->foreign('convenio_id')->references('id')->on('convenios')->onDelete('no action');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('padrones');
    }
};
