<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos_ms extends Model
{
    use HasFactory;
    protected $table="videos_ms";
    public function movie__series()
    {
        return $this->belongsTo(Movies_Series::class);
    }
    
    public function video()
    {
        return $this->belongsTo(Videos::class);
    }
}
