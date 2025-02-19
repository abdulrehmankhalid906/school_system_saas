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
        Schema::create('fee_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('fee_type_id')->nullable()->constrained('fee_types')->onDelete('set null');
            $table->integer('amount')->default(0);
            $table->integer('balance_due')->default(0);
            $table->date('due_date');
            $table->enum('status', ['due', 'paid', 'overdue'])->default('due');
            $table->string('fee_month',100);
            $table->timestamp('payment_date')->nullable();
            $table->foreignId('school_id')->nullable()->constrained('schools')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_payments');
    }
};
