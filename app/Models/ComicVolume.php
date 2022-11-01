<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComicVolume extends Model
{
    use HasFactory;

    protected $table = 'comic_volumes';
    protected $fillable = [
        'comic_id', 'volume_name', 'volume_link'
    ];
}
