<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Exhibit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'date',
        'gallery_id'
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function pieces()
    {
        return $this->hasMany(Piece::class);
    }

    
}
