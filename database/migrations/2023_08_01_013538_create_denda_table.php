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
        Schema::create('denda', function (Blueprint $table) {
            $table->id();
        
            $table->integer('keterlambatan')->nullable();
            // kerusakan : 1 = 100.000 - 2 = 300.000 - 3 = 500.000
            $table->integer('kerusakan')->nullable();
            $table->integer('terlambat')->nullable();
            $table->longText('deskripsi_kerusakan')->nullable();
            $table->foreignId('users_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('mobil_id')->constrained('mobil')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('sewa_id')->constrained('sewa')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('status')->nullable();
            $table->integer('tot_denda')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('denda');
    }
};
