<?php

use App\Models\admins;
use App\Models\User;
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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('borrower_id')->constrained('users')->cascadeOnDelete(); // this is role->user who will get the loan

            $table->decimal('amount', 12, 2);
            $table->decimal('interest_rate', 5, 2)->nullable();
            $table->integer('term_months');
            $table->enum('status', ['Pending', 'Approved', 'Paid']);

            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete(); // this is role->admin
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
