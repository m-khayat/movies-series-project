<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    use HasFactory;
    protected $table="favorites";

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function movie__series()
    {
        return $this->belongsTo(Movies_Series::class);
    }

    
}
