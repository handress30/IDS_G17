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
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->string('domain');
            $table->text('description')->nullable();
            $table->string('aux1')->nullable();
            $table->string('aux2')->nullable();
            $table->timestamp('date_hour')->useCurrent();
            $table->unsignedBigInteger('id_father')->default(0);
            $table->timestamps();
            $table->softDeletes(); // Manejar deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
};
