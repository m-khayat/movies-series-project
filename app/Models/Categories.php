<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table="categories";
    
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function categories()
    {
        return $this->hasMany(CategoriesMs::class);
    }
}
