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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('texto');
            $table->enum('valoracion',[1,2,3,4,5]);
            $table->foreignId('id_reserva')->constrained('reservas');
            $table->foreignId('id_usuario')->constrained('usuarios');
            $table->foreignId('id_comentario')->nullable()->constrained('comentarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
