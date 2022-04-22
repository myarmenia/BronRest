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
        ];


    public function menus()
    {
        return $this->belongsToMany(Menu::class,'user_order_menus','order_id','menu_id','id','id');
    }

    public function floors()
    {
        return $this->belongsToMany(FloorPlane::class,'user_order_floors','order_id','floor_plane_id','id','id');
    }

    public function rest()
    {
        return $this->hasOne(Restaurant::class,'id','restaurant_id')->select('id','name');
    }
}
