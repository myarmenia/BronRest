<?php

namespace App\Services;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Restaurant\FloorPlaneTable;

class UserOrderService
{

    public function store($data)
    {
        $data['user_id']= Auth::user()->id;

        $created = Order::create($data);

        if(isset($data['menus']))
        {
            foreach($data['menus'] as $menu)
            {
                $created->menus()
                ->attach($menu['id'],
                ['comment' => $menu['comment'], 'count' => $menu['count']]);
            }
        }

        if(isset($data['floors']))
        {
            foreach($data['floors'] as $floor)
            {
                $created->floors()
                ->attach($floor['id'],
                ['floor_plane_table_id' => $floor['table_id']
            ]);
            $tab  = FloorPlaneTable::find($floor['table_id']);
            $tab->free = 1;
            $tab->save();

                // ['floor_plane_x' => $floor['x'], 'floor_plane_y' => $floor['y']]);
            }
        }

        return $created;


    }




}
