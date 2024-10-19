<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'service_master'; 
    protected $fillable = [
        'id', 'page_id', 'admin_id' , 'name' , 'content' , 'image' , 'created_at', 'updated_at'
    ];
}
