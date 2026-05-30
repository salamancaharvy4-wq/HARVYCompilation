<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laundry_services', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->decimal('price', 8, 2);
            $table->unsignedInteger('duration_minutes');
            $table->string('detergent_type');
            $table->text('description')->nullable();
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laundry_services');
    }
};
