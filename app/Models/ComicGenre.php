<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComicGenre extends Model
{
    use HasFactory;

    protected $table = 'comic_genres';

    protected $fillable = [
        'genre_name', 'genre_slug'
    ];

    public function comic()
    {
        return $this->hasMany(ComicGenre::class, 'comic_genre_id');
    }
}
