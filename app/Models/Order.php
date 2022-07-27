<?php

namespace App\Models;

use App\Models\Restaurant\FloorPlane;
use App\Models\Restaurant\Menu;
use App\Models\Restaurant\Restaurant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $table = 'user_orders';

    public $fillable = [
        'restaurant_id',
        'user_id',
        'floor_plane_id',
        'coming_date',
        'people_nums',
        'status',
        ];


    public function menus()
    {
        return $this->belongsToMany(Menu::class,'user_order_menus','order_id','menu_id','id','id')
        ->withPivot(
            [
            'count as count',
            'user_order_menus.id as menu_order_id',
            'order_id as order_id',
            'user_order_menus.menu_id as menu_id',
            'user_order_menus.comment as comment'
        ]);
    }

    public function floors()
    {
        return $this->belongsToMany(FloorPlane::class,'user_order_floors','order_id','floor_plane_id','id','id');
    }

    public function rest()
    {
        return $this->hasOne(Restaurant::class,'id','restaurant_id')->select('id','name');
    }

    public function user()
    {
        return $this->belongsTo(User::class)->select('id','email','name','phone_number');
    }
}
