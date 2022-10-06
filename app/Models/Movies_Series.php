<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies_Series extends Model
{
    use HasFactory;
    protected $table="movies__series";
    
    public function users()
    {
        return $this->hasMany(User::class);
    }


    public function castingCrew()
    {
        return $this->hasMany(CastingCrew::class);
    }

    public function categoriesMs()
    {
        return $this->hasMany(CategoriesMs::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comments::class);
    }

    public function director()
    {
        return $this->belongsTo(Directors::class);
    }

    public function favorite()
    {
        return $this->hasMany(Favorites::class);
    }

    public function rate()
    {
        return $this->belongsTo(Rate::class);
    }

    public function videoMs()
    {
        return $this->hasMany(Videos_ms::class);
    }

    public function view()
    {
        return $this->belongsTo(Views::class);
    }

    public function watchNow()
    {
        return $this->hasMany(Watching_now::class);
    }
}
