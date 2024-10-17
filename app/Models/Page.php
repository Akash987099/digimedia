<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['menu_id', 'submenu_id',];

    
    public function submenu()
    {
        return $this->belongsTo(Submenu::class);
    }
}
