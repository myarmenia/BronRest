<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant\FloorPlaneTable;

class FloorPlanTableController extends Controller
{
    public function destroy(FloorPlaneTable $table)
    {
        $table->delete();
        return redirect()->back();
    }

    public function busy_free(FloorPlaneTable $table)
    {
        $table->free = !$table->free;
        $table->save();
        return response()->json(['message'=>'success','data'=>$table->free]);
    }
}
