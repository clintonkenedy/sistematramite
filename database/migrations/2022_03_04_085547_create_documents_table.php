<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->nullable()->default('2')->constrained('roles')->nullOnDelete()->cascadeOnUpdate();
            $table->bigInteger('tipo_id')->unsigned()->nullable();
            $table->string('codigo_tramite');
            $table->text('contenido')->nullable();
            $table->foreign('tipo_id')->references('id')->on('tipos')
                ->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('documents');
    }
}
