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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();

            $table->string('name')->required();
            $table->integer('students_limit')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->string('classroom')->comment('Sala da turma')->nullable();

            $table->date('startDate')->comment('Data final das aulas');
            $table->date('finalDate')->comment('Data final das aulas');
            $table->string('startTime')->comment('Horário inicial da aula');
            $table->string('endTime')->comment('Horário final da aula');

            $table->double('registrationFee')->nullable()->comment('Valor da matrícula');
            $table->double('maxInstallmentsRegistration')->nullable()->comment('Máximo de parcelas disponíveis da matrícula');

            $table->double('total_fee')->nullable()->comment('Preço total das matrículas');
            $table->double('maxInstallmentsTotal')->nullable()->comment('Máximo de parcelas disponíveis para o valor total');

            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
