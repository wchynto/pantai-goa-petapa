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
        Schema::create('transaksi_tikets', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('no_tiket', 10)->unique();
            $table->integer('jumlah_penumpang')->nullable();
            $table->date('expire_in')->nullable();
            $table->foreignUuid('status_tiket_id')->constrained('status_tikets', 'uuid')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('transaksi_id')->constrained('transaksis', 'uuid')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('tiket_id')->constrained('tikets', 'uuid')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_tikets');
    }
};
