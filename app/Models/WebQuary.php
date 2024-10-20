<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebQuary extends Model
{
    use HasFactory;

    protected $table = 'web_query'; 
    protected $fillable = [
        'id', 'name' , 'email' , 'peoject' , 'description' , 'created_at', 'updated_at'
    ];

}
