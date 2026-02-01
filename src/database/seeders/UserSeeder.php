<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => '宇野 敬',
                'email' => 'unotakky31@gmail.com',
                'password' => Hash::make('unottkymd31'), 
            ],
            [
                'name' => '芝田 達也',
                'email' => 'zhitiandazai83@gmail.com',
                'password' => Hash::make('shibatatatuya83'),
            ],
            [
                'name' => '橋本 陽一',
                'email' => 'hakaiou20067@gmail.com',
                'password' => Hash::make('hakaiou20067'),
            ],
        ]);
    }
}
