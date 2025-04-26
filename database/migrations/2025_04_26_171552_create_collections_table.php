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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();

            // Usuario que solicita
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Tipo de residuo
            $table->string('type_of_waste'); // Podrías usar aquí valores como "Orgánico", "Inorgánico", "Peligroso"

            // Fecha programada
            $table->date('date_requested');

            // Estado de la recolección
            $table->string('status')->default('Pendiente'); // Pendiente, Completado, Cancelado

            // Peso registrado (puede ser null hasta que recojan)
            $table->decimal('weight', 8, 2)->nullable();

            $table->timestamps();
            $table->softDeletes(); // Para borrado lógico
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};
