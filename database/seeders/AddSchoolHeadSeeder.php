<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
class AddSchoolHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
       $body=[
        "name"=>"School Admin",
        "role"=>"5",
        "email"=>"schooladmin@gmail.com",
        "phone"=>"0987456123",
        "image"=>"school-admin.png",
        "type"=>"user",
        "password"=>Hash::make('Buffer@2020')
       ];

       User::create($body);
    }
}
