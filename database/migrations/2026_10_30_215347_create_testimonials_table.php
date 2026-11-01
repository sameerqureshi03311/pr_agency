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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_designation');
            $table->string('client_company');
            $table->string('client_photo')->nullable();
            $table->string('company_logo')->nullable();
            $table->text('quote');
            $table->string('publication_featured_in')->nullable(); // e.g. 'Featured in Inc. & Bloomberg'
            $table->unsignedTinyInteger('rating')->default(5);
            $table->integer('display_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->boolean('is_featured')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
