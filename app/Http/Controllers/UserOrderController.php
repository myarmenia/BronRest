<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderCause;
use App\Http\Requests\OrderCauseReq;
use App\Models\Order;
use App\Models\User;
use App\Notifications\OrderCauseNot;
use App\Services\UserOrderService;
use App\Services\MessageService;


class UserOrderController extends Controller
{

    public function index()
    {
        return view('user_orders.index',['orders' => Auth::user()->userOrders]);
    }

    public function show($id)
    {
        $causes = OrderCause::get();
        $order = Auth::user()->userOrders()->with(
        [
            'floors' => function($q)
            {
                return $q->withPivot(["floor_plane_x as x","floor_plane_y as y"]);
            },
            'menus' => function($q)
            {
                return $q->withPivot(["count as count"]);
            }
        ])->find($id);
        return view('user_orders.show',['order' => $order,'causes' => $causes]);
    }

    public function store(OrderCauseReq $request,$id)
    {
        $validated = $request->validated();


        $order = Order::find($id);
        $order->status = $request['cause'];
        $order->save();

        $user = User::find($order['user_id']);
        $user->notify(new OrderCauseNot($request['cause']));

        if($user['phone_number']){
            $message = new MessageService();
            $message->sendSMS($user->phone_number,$request['cause']);
        }

        return redirect()->back();
    }
}
