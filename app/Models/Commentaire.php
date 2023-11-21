<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'contenu',
        'user_id',
        'article_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_id', 'name');
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_id');
    }
}
