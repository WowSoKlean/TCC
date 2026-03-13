<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Lab;       // Importe o Model
use App\Enums\LabType;    // Importe o Enum
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Cria o usuário padrão (opcional, útil para dev)
        // O firstOrCreate evita erro se você rodar o seed 2x
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'), // Senha padrão se criar agora
            ]
        );

        // 2. Cria TODOS os Labs definidos no Enum automaticamente
        // O método cases() retorna [EngenhariaSocial, Phishing, Malware, Ransomware]
        foreach (LabType::cases() as $labType) {
            Lab::firstOrCreate(
                ['slug' => $labType], // Busca pelo Enum
                ['name' => $labType->label()] // Define o nome legível
            );
        }
    }
}