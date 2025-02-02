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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained();
            $table->enum('type',['basic','premium'])->default('basic');
            $table->enum('usage_type',['trial','nonTrial'])->default('trial');
            $table->enum('payment_method', ['cash','bank_transfer','card','online'])->default('cash');
            $table->integer('amount')->default(0);
            $table->enum('status', ['due','paid','finished'])->default('due');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('duration')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
