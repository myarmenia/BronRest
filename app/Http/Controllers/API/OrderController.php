<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\UserOrderService;
use Illuminate\Http\Request;
use App\Http\Requests\UserOrderStoreReq;
use App\Repositories\ValidateRepository;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $userOrderServ;

    public function __construct()
    {
        $this->userOrderServ = new UserOrderService();
        // $this->middleware('permission:custom');
    }

    public function index()
    {
        return response()->json([
            'data' => Auth::user()->orders()->with(['rest'=>function($q){
                return $q->with('images');
            },'menus'])->get(),
            'message' => 'success'
        ], 200);
    }

    public function favorites()
    {
        // $data = Auth::user()
        // ->favoriteRests()
        // ->with('images')
        // ->get();
        $data = Auth::user()
        ->favoriteRests()
        ->with(['images'])
        ->get();


        return response()->json([
            'data' => $data,
            'message' => 'success'
        ], 200);
    }

    public function preference()
    {
        $data = Auth::user()
        ->perfDishes()
        ->get();


        return response()->json([
            'data' => $data,
            'message' => 'success'
        ], 200);
    }

    public function store(Request $request)
    {

        ValidateRepository::start($request->all(),
        [
            'restaurant_id' => 'required|integer',
            'floors.*.id' => 'required|integer',
            'floors.*.table_id' => 'required|integer',
            // 'floors.*.x' => 'required|integer',
            // 'floors.*.y' => 'required|integer',
            'coming_date' => 'date',
            'people_nums' => 'nullable|integer',
            'menus.*' => 'nullable'
        ]);

        $this->userOrderServ->store($request->all());

        return response()->json([
            'message' => 'success'
        ], 200);

    }
}
