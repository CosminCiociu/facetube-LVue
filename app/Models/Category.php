<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'imageUrl',
    ];

    /**
     * Get videos for category.
     */
    public function videos()
    {
        return $this->hasMany(Video::class,'category_id')->select(['id', 'title']);
    }
}
