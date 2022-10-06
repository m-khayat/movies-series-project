<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directors extends Model
{
    use HasFactory;
    protected $table="directors";
    
    public function users()
    {
        return $this->hasMany(User::class);
    }


    public function show()
    {
        return $this->hasMany(Movies_Series::class);
    }
}
