<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesMs extends Model
{
    use HasFactory;
    protected $table="categories_ms";
    public function movie__series()
    {
        return $this->belongsTo(Movies_Series::class);
    }


    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

}
