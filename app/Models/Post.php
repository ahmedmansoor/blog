<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'detail',
        'image',
    ];

    function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    function comments()
    {
        return $this->hasMany(Comment::class);
    }

    function likes()
    {
        return $this->hasMany(Like::class);
    }
}