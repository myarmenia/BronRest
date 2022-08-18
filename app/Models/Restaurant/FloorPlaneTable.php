<?php

namespace App\Models\Restaurant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloorPlaneTable extends Model
{
    use HasFactory;

    public $table = 'floor_plane_tables';

    public $fillable = [
        'floor_plane_id',
        'number',
        'count',
        'location',
        ];

    public function floor_plane()
    {
        return $this->belongsTo(FloorPlane::class,'floor_plane_id','id');
    }
}
