<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $table="rates";
    
    public function users()
    {
        return $this->hasMany(User::class);
    }


    public function show()
    {
        return $this->hasMany(Movies_Series::class);
    }

}
