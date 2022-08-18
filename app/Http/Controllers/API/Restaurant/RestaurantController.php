<?php

namespace App\Http\Controllers\API\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
       $data = Restaurant::with('parent','kitchen_categories','images')->where('parent_id','!=',NULL);
        if($request['q']){
            $data = $data->where(function ($query) use ($request){
                $query->where('name','LIKE','%'.$request['q'].'%')
                ->orWhereHas('parent', function($query) use ($request) {
                    $query->where('name','LIKE','%'.$request['q'].'%');
                })
                ->orWhereHas('kitchen_categories', function($query) use ($request) {
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
       $data = Restaurant::with(['mainImage','images','days','kitchen_categories','floor_planes'=>function($q){
        return $q->withSum('tables', 'count')->with('tables');
       }])->find($id);
       return response()->json([
            'data' => $data,
            'status' => 200
       ]);
    }


    public function storeFavorites($id)
    {
        $data = Auth::user()->favoriteRests()->where('restaurant_id',$id)->exists();
        if($data)
        {
            Auth::user()->favoriteRests()->detach($id);
        }else{
            Auth::user()->favoriteRests()->attach($id);
        }
        return response()->json([
            'data' => $data,
            'status' => 200
       ]);
    }
}
