<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    
    protected $table="actors";
    public function users()
    {
        return $this->hasMany(User::class);
    }


    public function castingCrew()
    {
        return $this->hasMany(CastingCrew::class);
    }

}
