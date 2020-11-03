<?php

namespace App\Models;

use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, MustVerifyEmail;
    
    protected $fillable = [
        'name', 'email', 'password', 'active',
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'active' => 'boolean'
    ];
    
    public function getIsActiveAttribute()
    {
        return $this->active;
    }
}
