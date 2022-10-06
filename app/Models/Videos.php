<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;
    protected $table="videos";
    
    public function users()
    {
        return $this->hasMany(User::class);
    }


    public function videoMs()
    {
        return $this->hasMany(Videos_ms::class);
    }

}
