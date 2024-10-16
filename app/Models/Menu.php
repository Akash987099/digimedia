<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function submenus()
    {
        return $this->hasMany(Submenu::class);
    }
    
    public function page()
    {
        return $this->hasOne(Page::class);
    }
}
