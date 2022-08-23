<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Restaurant\Menu;

class UserOrderHistoryController extends Controller
{
    public function tables(Request $request)
    {
            $validated = $request->validate([
                // 'hall' => 'required|integer',
                // 'x' => 'required|integer',
                // 'y' => 'required|integer',
                'table_id' => 'required|integer'
            ]);
            $data = Order::with('floors','user')->whereHas('floors', function($q) use ($validated){
                return $q->where('floor_plane_table_id',$validated['table_id']);
            });

            if(isset($request['date']))
            {
                $date = Carbon::parse($request->date);
                $data = $data->whereMonth('coming_date', '=', $date->month)
                ->whereYear('coming_date', $date->year)
                ->whereDay('coming_date', $date->day);

            }

            $data = $data->get();

            if(!count($data))
            {
                return redirect()->back()->with('history',"$request->table_id столика нету истории");
            }

            return view('user_orders.history.index',compact('data'));

    }

    public function restaurants()
    {
        $datas = Auth::user()->restaurants()->with(['floor_planes'=>function($q){
            return $q->with('tables');
        }])->whereNotNull('parent_id')->get();

        return view('user_orders.history.restaurants',compact('datas'));
    }

    public function single(Order $order)
    {
        return view('user_orders.history.single',compact('order'));

    }

    public function singleStore(Order $order,Request $request)
    {
        $validated = $request->validate([
            'coming_date' => 'nullable',
            'status' => 'nullable',
            'people_nums' => 'nullable',
            'status' => 'nullable|in:1,0'
        ]);


        $order->update($validated);

        return redirect()->back()->with('message','success');


    }

    public function orderMenu(Order $order)
    {
        $menu_lists = Menu::where('restaurant_id',$order['restaurant_id'])->get();

        $menus = $order->menus;
        $price = 0;

        return view('user_orders.history.menu',compact('menus','price','menu_lists'));
    }

    public function orderMenuDestroy(Order $order,$order_menu)
    {


         $order->menus()->wherePivot('id','=',$order_menu)->detach();


        return redirect()->back()->with('message','success');
    }

    public function orderMenuStore(Order $order,Request $request)
    {
        $validated = $request->validate([
            'menu_id' => 'required|integer',
            'count' => 'required|integer',
            'comment' => 'required|string',
        ]);

        $order->menus()->attach([$validated]);


        return redirect()->back()->with('message','success');
    }

    public function orderMenuEdit(Order $order,$order_menu)
    {

        $menu_lists = Menu::where('restaurant_id',$order['restaurant_id'])->get();

        $menu = $order->menus()->where('user_order_menus.id',$order_menu)->first();

        return view('user_orders.history.menu-edit',compact('menu','menu_lists'));
    }

    public function orderMenuUpdate(Order $order,$order_menu,Request $request)
    {

        $validated = $request->validate([
            'menu_id' => 'required|integer',
            'count' => 'required|integer',
            'comment' => 'required|string',
        ]);

        $order->menus()->where('user_order_menus.id',$order_menu)->update($validated);

        return redirect()->back()->with('message','success');

    }
}
