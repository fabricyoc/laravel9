<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'tags',
        'author',
    ];

    // protected $with = ['user']; // dispensa o uso do load p carregar a relação

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
