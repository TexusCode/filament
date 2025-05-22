<?php

namespace App\Models\Blog;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'cover',
        'title',
        'slug',
        'content',
        'video',
        'status',
        'views',
        'tags',

    ];
    protected $casts = [
        'tags' => 'array',
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category()
    {
        return $this->belongsTo(PostCategories::class, 'id');
    }
}
