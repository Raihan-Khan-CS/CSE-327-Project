<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Raihan Khan',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '01738950996',
            'image' => 'public/admin/RaihanKhan.jpg',
            'role_id' => '2',
            'address' => 'Khulna, Bangladesh',
        ]);
        DB::table('admins')->insert([
            'name' => 'Meherin Islam Maisha',
            'email' => 'maisha@gmail.com    ',
            'password' => Hash::make('12345678'),
            'phone' => '01883675858',
            'image' => 'public/admin/baby.jpg',
            'role_id' => '2',
            'address' => 'Sonargoan, Narayanganj',
        ]);
    }
}
