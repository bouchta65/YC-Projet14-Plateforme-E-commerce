<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use  HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'role',
        'theme'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

 
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    
    public function isClient(): bool
    {
        return $this->role === 'client';
    }
}
