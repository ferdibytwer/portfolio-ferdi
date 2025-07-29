<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sertif extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'lembaga',
        'description',
        'link',
        'category_id',
        'user_id'
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
