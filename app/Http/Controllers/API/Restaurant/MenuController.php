<?php

namespace App\Http\Controllers\API\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant\Menu;
use App\Models\Restaurant\MenuCategory;

class MenuController extends Controller
{
    public function index(Request $request,$id)
    {
        $data = Menu::where('restaurant_id',$id);
        if($request['category']){
            $data = $data->where('category_id',$request['category']);
        }
        $data = $data->get();

        return response()->json([
            'data' => $data,
            'status' => 200
       ]);
    }

    public function categories($id)
    {


        $data = MenuCategory::whereHas('menus', function ($query) use ($id){
            $query->where('restaurant_id', $id);
        })->get();

        return response()->json([
            'data' => $data,
            'status' => 200
       ]);
    }

    public function single($id)
    {
        $data = Menu::find($id);

        return response()->json([
            'data' => $data,
            'status' => 200
       ]);
    }
}
