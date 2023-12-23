<?php

use App\Enums\EmploymentType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 60);
            $table->enum('employment_type', array_map(fn($enum) => $enum->value, EmploymentType::cases()));
            $table->string('company_name', 100);
            $table->string('role', 100);
            $table->string('apply_url');
            $table->string('company_logo');
            $table->text('description');
            $table->string('salary', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
