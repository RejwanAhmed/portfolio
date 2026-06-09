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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cv_id')->constrained('cvs')->nullOnDelete();
            $table->string('company_name');
            $table->string('title');
            $table->string('job_url')->nullable();
            $table->string('source')->nullable();
            $table->string('location')->nullable();
            $table->unsignedInteger('salary_min')->nullable();
            $table->unsignedInteger('salary_max')->nullable();
            $table->enum('status', ['saved', 'applied', 'offer', 'accepted', 'rejected', 'withdrawn'])->default('saved');
            $table->date('application_date')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
