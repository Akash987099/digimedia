<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'project_master'; 
    protected $fillable = [
        'id', 'page_id', 'admin_id' , 'project_name' , 'content' , 'image' , 'created_at', 'updated_at'
    ];

}
