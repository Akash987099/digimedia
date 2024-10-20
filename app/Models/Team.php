<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team_master'; 
    protected $fillable = [
        'id', 'page_id', 'admin_id' , 'name' , 'designation' , 'experiance' , 'image' , 'created_at', 'updated_at'
    ];

}
