<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class HistoryController extends Controller
{

    public function index(Request $request)
    {

        $user = Auth::user();
        $data = $user->restaurantOrders();

        if(isset($request->rest))
        {
            $data = $data->where('restaurant_id',$request->rest);
        }

        if(isset($request['date_from']))
        {
                $date_from = Carbon::parse($request->date_from);
                $data = $data->whereMonth('coming_date', '>=', $date_from->month)
                ->whereYear('coming_date','>=', $date_from->year)
                ->whereDay('coming_date','>=', $date_from->day);

        }

        if(isset($request['date_to']))
        {
                $date_to = Carbon::parse($request->date_to);
                $data = $data->whereMonth('coming_date', '<=', $date_to->month)
                ;

        }
        $rests = $user->restaurants;
        $data = $data->with('menus')->get();
        return view('restaurant.history.index',compact('data','rests'));
    }
}
