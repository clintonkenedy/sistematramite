<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('externos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->cascadeOnUpdate()
                ->constrained('documents');
            // $table->bigInteger('document_id')->unsigned();
            $table->string('nombre');
            $table->string('ruc');
            $table->string('celular');
            $table->string('correo');

            // $table->foreign('document_id')->references('id')->on('documents')
            //     ->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('externos');
    }
}
