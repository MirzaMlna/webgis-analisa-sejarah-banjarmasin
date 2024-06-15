<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'level',
    ];

    public function scopeOrderedByLevel($query)
    {
        $order = ['kepala', 'super admin', 'admin', 'tamu'];
        $query->orderByRaw("FIELD(level, '" . implode("','", $order) . "')");
    }
}
