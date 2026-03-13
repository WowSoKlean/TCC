<?php

namespace App\Models;

use App\Models\Lab;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relacionamento Many-to-Many com Labs.
     */
    public function labs()
    {
        return $this->belongsToMany(Lab::class, 'lab_user');
    }
    
    /**
     * Helper para pegar a porcentagem de progresso (0, 25, 50, 75, 100)
     * Como são 4 labs, cada um vale 25%.
     */
    public function getProgressAttribute()
    {
        return $this->labs()->count() * 25;
    }
}
