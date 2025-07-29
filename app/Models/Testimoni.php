<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $fillable = [
        'name',
        'status',
        'message',
        'image', // Assuming image is a file path or URL
    ];
}
