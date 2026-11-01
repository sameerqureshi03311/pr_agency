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
        Schema::create('page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('page')->default('home'); // home, about, services, contact
            $table->string('section'); // hero, intro, founder, standards, cta
            $table->string('key');
            $table->longText('value')->nullable();
            $table->string('label')->nullable();
            $table->string('type')->default('text'); // text, textarea, richtext, image
            $table->unique(['page', 'section', 'key']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_contents');
    }
};
