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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            //Header....
            $table->string('title','50');
            $table->string('base_url');
            $table->string('frontend_text','25');
            $table->string('backend_logo','255');
            $table->string('backend_text','255');
            //Footer....
            $table->string('newsletter_text');
            $table->json('contacts');
            $table->json('socials_links');
            $table->integer('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
