<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_role', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')
                ->constrained('documents')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('role_id')->default('2')
                ->constrained('roles')->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreignId('role_id')
            //     ->constrained('roles')->nullOnDelete()->cascadeOnUpdate();
            $table->enum('estado', ['Pendiente', 'Rechazado','Aprobado'])->default('Pendiente');
            //ENUM('PENDIENTE', 'RECHAZADO', 'APROBADO')
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
        Schema::dropIfExists('document_role');
    }
}
