<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table="comments";
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function show()
    {
        return $this->hasMany(Movies_Series::class);
    }

}
