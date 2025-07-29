<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Form yang bisa diisi
    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'category_id',
        'user_id', // author
    ];

    // Eager load relationships
    protected $with = ['user', 'category'];

    public function category()
    {
        return $this->belongsTo(Category::class); // kategori post
    }
    public function user()
    {
        return $this->belongsTo(User::class); // author
    }
}
