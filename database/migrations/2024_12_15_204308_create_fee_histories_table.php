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
        Schema::create('fee_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fee_payment_id')->nullable()->constrained('fee_payments')->onDelete('cascade');
            $table->integer('amount')->default(0);
            $table->enum('method', ['cash', 'bank_transfer', 'card', 'online'])->default('cash');
            $table->date('transaction_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_histories');
    }
};
