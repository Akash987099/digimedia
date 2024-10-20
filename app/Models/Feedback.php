<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks'; 
    protected $fillable = [
        'id', 'name', 'email' , 'star' , 'description' , 'image' , 'created_at', 'updated_at'
    ];

}
