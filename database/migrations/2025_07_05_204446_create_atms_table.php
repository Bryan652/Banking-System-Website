<?php

use App\Models\accounts;
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
        Schema::create('atms', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(accounts::class);
            $table->string('card_number');
            $table->string('pin_hash');
            $table->enum('status', ['Active', 'Blocked', 'Expired']);
            $table->dateTime('issued_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atms');
    }
};
