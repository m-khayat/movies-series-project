<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CastingCrew extends Model
{
    use HasFactory;
    protected $table="casting_crews";
    public function actor()
    {
        return $this->belongsTo(Actor::class);
    }


    public function movie__series()
    {
        return $this->belongsTo(Movies_Series::class);
    }

}
