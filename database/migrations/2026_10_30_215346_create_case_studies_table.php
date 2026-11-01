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
        Schema::create('case_studies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('client_name');
            $table->string('client_designation')->nullable();
            $table->string('industry');
            $table->string('publication_name');
            $table->string('publication_url')->nullable();
            $table->string('publication_badge')->nullable(); // e.g. 'Forbes Council', 'Fast Company'
            $table->text('campaign_objective');
            $table->longText('challenge')->nullable();
            $table->longText('strategy')->nullable();
            $table->longText('execution')->nullable();
            $table->string('results_metric')->nullable(); // e.g. '+480% Brand Searches'
            $table->text('results_summary')->nullable();
            $table->json('metrics_breakdown')->nullable(); // [{"label": "Direct Inquiries", "value": "120+"}]
            $table->string('featured_image')->nullable();
            $table->json('gallery_images')->nullable();
            $table->integer('display_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_studies');
    }
};
