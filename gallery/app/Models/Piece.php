<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'artist_id',
        'exhibit_id'
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function exhibit()
    {
        return $this->belongsTo(Exhibit::class);
    }
}
