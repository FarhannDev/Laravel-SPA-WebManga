<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    protected $table = 'comics';

    protected $fillable = [
        'comic_genre_id', 'comic_title', 'comic_slug', 'comic_author',
        'comic_artist', 'comic_rating', 'comic_released', 'comic_cover',
        'comic_alternative', 'comic_sinopsis'
    ];

    public function genre()
    {
        return $this->belongsTo(ComicGenre::class, 'comic_genre_id');
    }
}
