<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAseguradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asegurados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('domicilio');
            $table->string('localidad');
            $table->string('pais');
            $table->string('doc_tipo');
            $table->string('doc_numero');
            $table->integer('orden');
            $table->decimal('peso',4,4);
            $table->decimal('altura',4,4);
            $table->string('toma_medicamento');
            $table->string('pcr')->nullable();
            $table->string('cual_medicamento')->nullable();
            $table->string('sintomas')->nullable();
            $table->string('cual_sintoma')->nullable();
            $table->string('expuesto')->nullable();
            $table->string('cual_expuesto')->nullable();
            $table->string('contacto')->nullable();
            $table->string('cual_contacto')->nullable();
            $table->string('id_certificado')->nullable();
            $table->string('user');

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
        Schema::dropIfExists('asegurados');
    }
}
