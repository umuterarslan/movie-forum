<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    use HasFactory;

    public function comments(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'comments')->withPivot('comment');
    }

    protected $table = 'movies';

    protected $fillable = [
        'name',
        'description',
        'genre',
        'release_date',
        'director'
    ];
}
