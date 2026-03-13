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
        Schema::create('lab_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('lab_id')->constrained()->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent(); // Data da conclusão
            
            // Garante que o mesmo usuário não completa o mesmo lab 2x
            $table->unique(['user_id', 'lab_id']); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_user');
    }
};
