<?php

namespace App\Models\Blog;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'user_id',
        'cover',
        'title',
        'slug',
        'content',
        'video',
        'status',
        'views',
        'tags',
    ];

    public function author()
    {
        $this->belongsTo(User::class);
    }
}
