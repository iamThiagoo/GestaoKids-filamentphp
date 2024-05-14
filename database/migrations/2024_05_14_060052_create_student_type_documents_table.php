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
        Schema::create('student_type_documents', function (Blueprint $table) {
            $table->id();

            $table->string('name', 255);
            $table->boolean('required');
            $table->timestamp('expirationTime')->nullable();

            $table->string('created_by', 255);
            $table->string('updated_by', 255);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_type_documents');
    }
};
