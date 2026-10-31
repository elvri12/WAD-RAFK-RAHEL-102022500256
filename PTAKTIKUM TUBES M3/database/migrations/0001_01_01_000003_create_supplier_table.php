<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('supplier')) {
            return;
        }

        Schema::create('supplier', function (Blueprint $table) {
            $table->string('ID_Perusahaan', 20)->primary();
            $table->string('Nama_Supplier', 100);
            $table->text('Alamat');
            $table->string('No_Telepon', 20);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('supplier');
    }
};