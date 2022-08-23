<?php

namespace App\Services\Restaurant;
use App\Models\Restaurant\FloorPlane;
use App\Services\FileSystemService;

class FloorPlaneService
{
    public $fileServ;

    public function __construct()
    {
        $this->fileServ = new FileSystemService('restaurant/floor_plane');
    }

    public function store($data)
    {

        $floorPlane = FloorPlane::create($data);

        if(count($data['table']))
        {
            foreach($data['table'] as $table)
            {
                $floorPlane->tables()->create($table);
            }
        }

        // if(isset($data['img'])){
        //     $img = $this->fileServ->createImage($created['id'],$data['img']);
        //     $created['img'] = $img;
        //     $created->save();
        // }

        return $floorPlane;

    }

    public function getByRestaurantId(Int $id){
        $data = FloorPlane::withSum('tables', 'count')->with('tables')->where('restaurant_id',$id)->get();
        return $data;
    }

    public function find(int $id)
    {
        $data = FloorPlane::with('tables')->find($id);

        return $data;
    }

    public function update(Int $id,$data){
        $find = $this->find($id);
        $updated = $find->update($data);


        if(count($data['table']))
        {
            foreach($data['table'] as $table)
            {
                $find->tables()->updateOrCreate(['id'=>$table['id']],$table);;
            }
        }
        return $updated;
    }

}
