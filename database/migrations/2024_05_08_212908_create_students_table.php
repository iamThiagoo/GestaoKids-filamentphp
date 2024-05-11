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
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name', 200);
            $table->string('email', 200);
            $table->string('password');
            $table->string('photo')->comment('Foto do estudante')->nullable();
            $table->date('birthday')->comment('Aniversário do estudante');
            $table->string('nacionality', 50)->nullable()->comment('Nacionalidade do estudante');
            $table->enum('gender', ['M', 'F'])->comment('Gênero do estudante');
            $table->enum('status', [
                'in progress',
                'enrolled',
                'approved',
                'failed',
                'awaiting enrollment',
                'suspended',
                'on hold',
                'transferred',
                'graduated'
            ])->comment('Status do estudante diante a instituição');
            $table->boolean('hasADisability')->default(FALSE)
                  ->comment('Flag que informa se o estudante possui alguma deficiência/cuidado especial');

            // Campos opcionais
            $table->string('cpf', 11)->nullable()->comment('CPF do estudante');
            $table->text('details')->nullable()->comment('Observações extras do estudante');
            $table->string('bloodType', 4)->nullable()->comment('Tipo sanguíneo do estudante');
            $table->string('typeOfDisability')->nullable()->comment('Campo destinado a especificação da deficiência/cuidado especial do estudante');

            $table->timestamp('joinDate')->comment("Timestamp que informa quando estudante entrou na instituição.");
            $table->timestamp('outputDate')->comment("Timestamp que informa quando estudante saiu da instituição.")->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
