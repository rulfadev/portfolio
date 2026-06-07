<?php

use App\Models\ClientReviewLink;
use App\Models\Project;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('client_reviews', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(ClientReviewLink::class)
                ->unique()
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignIdFor(Project::class)
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('client_name');
            $table->string('client_role')->nullable();
            $table->string('company')->nullable();

            $table->unsignedTinyInteger('rating');
            $table->text('message');
            $table->text('suggestions')->nullable();

            $table->boolean('consent_to_publish')->default(false);

            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();

            $table->timestamp('submitted_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('client_reviews');
    }
};
