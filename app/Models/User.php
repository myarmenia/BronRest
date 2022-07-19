<?php

namespace App\Models;

use App\Models\Restaurant\Menu;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Restaurant\Restaurant;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'age',
        'gender',
        'avatar'
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

    public function isAdmin()
    {
        return $this->hasRole('Admin');
    }

    public function setPasswordAttribute($v)
    {
        $this->attributes['password'] = Hash::make($v);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function favoriteRests()
    {
        return $this->belongsToMany(Restaurant::class,'user_favorite_restaurants');
    }

    public function perfDishes()
    {
        return $this->belongsToMany(Menu::class,'user_preference_dishes','user_id','dishes_id');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function userOrders()
    {
        return $this->hasManyThrough(Order::class, Restaurant::class);
    }
}
