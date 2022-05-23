<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = "video";

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'imageUrl',
        'videoUrl',
        'duration',
        'folderName',
        'likes',
        'views'
    ];

    /**
     * Get category for the video.
     */
    public function category()
    {
        return $this->belongsTo(Category::class)->select(['id', 'title']);
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'category_video');
    }
}
