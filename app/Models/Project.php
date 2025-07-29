<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'link',
        'category_id',
        'user_id', // tampilkan nama user
    ];

    // Eager load relationships
    protected $with = ['user', 'category'];

    public function category()
    {
        return $this->belongsTo(Category::class); // kategori project
    }

    public function user()
    {
        return $this->belongsTo(User::class); // author
    }
}
