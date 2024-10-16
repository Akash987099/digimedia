<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['menu_id', 'submenu_id', 'title', 'content', 'image','page_title_2','page_content_2','page_title_3','page_content_3','page_title_4','page_content_4','page_title_5','page_content_5','page_image_5', 'video_link', 'slug', 'marquee_content', 'banner1_file', 'banner1_title', 'banner1_content', 'banner2_file', 'banner2_title', 'banner2_content', 'banner3_file', 'banner3_title', 'banner3_content'];

    
    public function submenu()
    {
        return $this->belongsTo(Submenu::class);
    }
}
