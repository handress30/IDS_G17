<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('waste_types', function (Blueprint $table) {
            $table->string('color_hex', 7)->default('#FFFFFF')->after('name');

        });
    }

    public function down(): void
    {
        Schema::table('waste_types', function (Blueprint $table) {
            $table->dropColumn('color_hex');
        });
    }
};
