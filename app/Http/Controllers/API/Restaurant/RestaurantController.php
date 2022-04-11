<?php

namespace App\Http\Controllers\API\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
       $data = Restaurant::with('parent')->where('parent_id','!=',NULL);
        if($request['q']){
            $data = $data->where(function ($query) use ($request){
                $query->where('name','LIKE','%'.$request['q'].'%')
                ->orWhereHas('parent', function($query) use ($request) {
                    $query->where('name','LIKE','%'.$request['q'].'%');
                });

            });
        }
       $data = $data->get();
       return response()->json([
            'data' => $data,
            'status' => 200
       ]);
    }

    public function single($id)
    {
       $data = Restaurant::with('mainImage','images','floor_planes','days')->find($id);
       return response()->json([
            'data' => $data,
            'status' => 200
       ]);
    }
}
