<?php

namespace App\Models\Restaurant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FloorPlane extends Model
{
    use HasFactory;

    public $table = 'floor_planes';

    public $fillable = [
        'restaurant_id',
        'hall_name',
        'background_img',
        'table_x',
        'table_y',
        'data_json',
        'description'
        ];

    public function tables()
    {
        return $this->hasMany(FloorPlaneTable::class,'floor_plane_id','id');
    }

}
