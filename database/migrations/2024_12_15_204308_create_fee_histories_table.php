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
            $table->foreignId('fee_payment_id')->constrained('fee_payments')->onDelete('cascade');
            $table->integer('amount', 10);
            $table->enum('method', ['Cash', 'Bank Transfer', 'Card', 'Online'])->default('Cash');
            $table->date('transaction_date');
            $table->foreignId('recieved_by')->nullable()->constrained('users')->onDelete('set null');
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
