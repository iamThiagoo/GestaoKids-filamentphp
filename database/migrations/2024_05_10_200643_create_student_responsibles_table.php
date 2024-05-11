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
        Schema::create('student_responsibles', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->date('birthday');

            $table->enum('marital_status', ['single', 'married', 'divorced', 'separated', 'widower/widow'])->nullable();
            $table->string('occupation')->nullable();
            $table->string('workplace')->nullable();
            $table->string('cpf');

            $table->foreignId('student_id')->constrained()->onDelete('cascade');

            $table->string('relationship');
            $table->string('details')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_responsibles');
    }
};
