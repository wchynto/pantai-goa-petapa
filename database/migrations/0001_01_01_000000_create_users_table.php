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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('email', 50)->unique();
            $table->string('no_telpon', 13)->unique();
            $table->string('password', 100);
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignUuid('pengunjung_uuid')->constrained('pengunjungs', 'uuid')->cascadeOnUpdate()->restrictOnDelete();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('user_sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_uuid')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('user_sessions');
    }
};
