<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->nullable();

            $table->string('client_name')->nullable();
            $table->boolean('is_client_private')->default(false);

            $table->string('thumbnail')->nullable();
            $table->json('gallery')->nullable();

            $table->text('summary');
            $table->longText('description')->nullable();

            $table->text('problem')->nullable();
            $table->text('solution')->nullable();
            $table->text('result')->nullable();

            $table->json('features')->nullable();
            $table->json('tech_stack')->nullable();

            $table->string('demo_url')->nullable();
            $table->string('repo_url')->nullable();

            $table->string('status')->default('private');
            $table->year('year')->nullable();

            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();

            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
