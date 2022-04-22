<?php

namespace App\Http\Controllers\API\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant\KitchenCategorie;
use Illuminate\Http\Request;

class KitchenCategorieController extends Controller
{
    public function index()
    {
        $data = KitchenCategorie::get();

        return response()->json([
            'data' => $data,
            'status' => 200
       ]);
    }
}
