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
        Schema::create('coseguros', function (Blueprint $table) {
            $table->id();
            $table->string('pca_desde',6);
            $table->string('pca_hasta',6);
            $table->unsignedBigInteger('cantidad');
            $table->unsignedBigInteger('convenio_id');
            $table->double('coseguro');
            $table->date('vigencia');
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
        Schema::dropIfExists('coseguros');
    }
};
