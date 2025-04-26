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
        Schema::table('collections', function (Blueprint $table) {
            $table->dropColumn('type_of_waste');

            $table->foreignId('waste_type_id')->after('user_id')->constrained('waste_types')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('collections', function (Blueprint $table) {
            $table->dropForeign(['waste_type_id']);
            $table->dropColumn('waste_type_id');
            $table->string('type_of_waste');
        });
    }
};
