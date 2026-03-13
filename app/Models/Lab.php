<?php

namespace App\Models;

use App\Enums\LabType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    // A MÁGICA ACONTECE AQUI:
    // O Laravel converte automaticamente string do banco <-> Enum no código
    protected $casts = [
        'slug' => LabType::class,
    ];
}