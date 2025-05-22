<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class PostCategories extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function post()
    {
        return $this->hasMany(Posts::class, 'category_id');
    }
}
