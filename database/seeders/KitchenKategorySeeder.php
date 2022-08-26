<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant\KitchenCategorie;

class KitchenKategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $datas = [
            ['name'=>'Европейская'],
            ['name'=>'Русская'],
            ['name'=>'Американская'],
            ['name'=>'Грузинская'],
            ['name'=>'Итальянская'],
            ['name'=>'Японская'],
            ['name'=>'Корейская'],
            ['name'=>'Азиатские'],
            ['name'=>'Кавказская'],
            ['name'=>'Армянская'],
        ];

        KitchenCategorie::insert($datas);
    }
}
