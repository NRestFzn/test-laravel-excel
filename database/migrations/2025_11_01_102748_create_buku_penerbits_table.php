<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('buku_penerbits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buku_id')->constrained('bukus', 'id')->onDelete('cascade');
            $table->foreignId('penerbit_id')->constrained('penerbits', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('buku_penerbits');
    }
};
