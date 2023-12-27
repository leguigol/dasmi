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
        Schema::create('crecimientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('padron_id');
            $table->date('fecha_consulta');
            $table->date('fecha_nacimiento');
            $table->string('sexo',1);
            $table->string('estatura',5);
            $table->double('z_estatura');
            $table->string('peso',5);
            $table->double('z_peso');
            $table->double('imc');
            $table->unsignedBigInteger('centro_id');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('crecimientos');
    }
};
