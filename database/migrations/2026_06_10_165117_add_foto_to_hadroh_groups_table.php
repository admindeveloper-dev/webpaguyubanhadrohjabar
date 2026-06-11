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
    Schema::table('hadroh_groups', function (Blueprint $table) {
        // Menambahkan kolom foto setelah kolom nomor_hp dan sifatnya opsional (nullable)
        $table->string('foto')->nullable()->after('nomor_hp');
    });
}

public function down(): void
{
    Schema::table('hadroh_groups', function (Blueprint $table) {
        $table->dropColumn('foto');
    });
}
};
