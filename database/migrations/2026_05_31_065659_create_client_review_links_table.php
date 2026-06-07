<?php

use App\Models\Project;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('client_review_links', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Project::class)
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('client_name');
            $table->string('client_email')->nullable();
            $table->string('client_phone')->nullable();

            $table->string('token')->unique();

            $table->boolean('is_active')->default(true);
            $table->timestamp('expires_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('client_review_links');
    }
};
