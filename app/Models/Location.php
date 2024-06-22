<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'locations';
    protected $fillable = [
        'location_name',
        'history',
        'coordinates',
        'image',
    ];
}
