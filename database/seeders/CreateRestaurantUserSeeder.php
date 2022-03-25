<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRestaurantUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'user',
            'email' => 'restaurant@gmail.com',
            'password' => '12345678',
            'email_verified_at' => date("Y-m-d h:i:sa")
        ]);


        $role = Role::create(['name' => 'RestaurantUser']);

        $permissions = Permission::where('name','restaurant')->pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
