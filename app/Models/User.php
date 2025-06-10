<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'user';

    protected $fillable = [
        'nik',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    // Ganti default auth login key (default: email)
    public function getAuthIdentifierName()
    {
        return 'nik';
    }
}
