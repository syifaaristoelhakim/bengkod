<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Add 'role' to the $fillable property to allow mass assignment
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Add 'role' here
    ];
}
