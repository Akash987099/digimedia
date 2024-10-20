<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins'; 
    
    protected $fillable = [
        'id', 'username',  'name', 'usertype', 'show_password', 'mobile' , 'status' , 'role' , 'email1' , 'address' , 'footer_logo' , 'header_logo', 'web_name' ,  'password', 'email',  'created_at', 'updated_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
