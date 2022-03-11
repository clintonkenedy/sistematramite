<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->cascadeOnDelete()->cascadeOnUpdate()
                ->constrained('documents');
            $table->enum('estado', ['Pendiente', 'Rechazado','Aprobado','Finalizado'])->default('Pendiente');
            $table->string('oficina');
            $table->string('oficina_derivada');
            $table->string('comentario')->nullable();

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
        Schema::dropIfExists('seguimientos');
    }
}
