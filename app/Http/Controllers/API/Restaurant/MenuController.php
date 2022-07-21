<?php

namespace App\Http\Controllers\API\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant\Menu;
use App\Models\Restaurant\MenuCategory;
use Illuminate\Support\Facades\Auth;

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
        return view('restaurant.menu.index',compact('data'));
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

    public function storePreference($id)
    {
        $data = Auth::user()->perfDishes()->where('dishes_id',$id)->exists();
        if($data)
        {
            Auth::user()->perfDishes()->detach($id);
        }else{
            Auth::user()->perfDishes()->attach($id);
        }
        return response()->json([
            'data' => $data,
            'status' => 200
       ]);
    }
}

Хирург-имплантолог
Кандидат Медицинских Наук
