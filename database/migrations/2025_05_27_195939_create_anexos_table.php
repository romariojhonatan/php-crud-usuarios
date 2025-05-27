<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anexo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tarefa_id')->constrained('tarefa')->onDelete('cascade');
            $table->string('nome_arquivo');
            $table->string('caminho');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anexos');
    }
};
