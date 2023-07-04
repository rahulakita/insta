<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class image_upload extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'image_upload';
    protected $fillable = [
        'phone',
        'image_name',
    ];
}
