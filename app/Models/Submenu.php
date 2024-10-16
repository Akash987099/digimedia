<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    use HasFactory;

    protected $fillable = ['menu_id', 'name', 'slug'];

    
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    
    public function page()
    {
        return $this->hasOne(Page::class);
    }
}
