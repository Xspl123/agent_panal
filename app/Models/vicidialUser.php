<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;


class vicidialUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'vicidial_users';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user',
        'pass',
        'full_name',
        'user_level',
        'user_group',
        'phone_login',
        'phone_pass',
        'delete_users',
        'delete_user_groups'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
