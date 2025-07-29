<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];
    public function projects()
    {
        return $this->hasMany(Project::class); // projects under this category
    }
    public function posts()
    {
        return $this->hasMany(Post::class); // posts under this category
    }
    public function sertifs()
    {
        return $this->hasMany(Sertif::class); // certificates under this category
    }
    public function services()
    {
        return $this->hasMany(Service::class); // services under this category
    }   
}
