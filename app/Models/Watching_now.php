<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watching_now extends Model
{
    use HasFactory;
    protected $table="watching_nows";

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function movie__series()
    {
        return $this->belongsTo(Movies_Series::class);
    }

}
