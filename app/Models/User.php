<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $table="users";

    public function favorites()
    {
      return $this->belongsTo(Favorites::class);
    }

    public function aboutUs()
    {
        return $this->belongsTo(AboutUs::class);
    }
 
    public function actor()
    {
        return $this->belongsTo(Actor::class);
    }
 
    public function catrgory()
    {
        return $this->belongsTo(Categories::class);
    }
 
    public function comment()
    {
        return $this->hasMany(Comments::class);
    }
 
    public function director()
    {
        return $this->belongsTo(Directors::class);
    }
 
    public function MoviesSeries()
    {
        return $this->belongsTo(Movies_Series::class);
    }
 
    public function rate()
    {
        return $this->belongsTo(Rate::class);
    }
 
    public function slider()
    {
        return $this->belongsTo(Slider::class);
    }
 
    public function videos()
    {
        return $this->belongsTo(Videos::class);
    }
 
    public function view()
    {
        return $this->belongsTo(Views::class);
    }
 
    public function watchNow()
    {
        return $this->belongsTo(Watching_now::class);
    }


}
