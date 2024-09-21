<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       DB::table('users')->insert([[
        'firstname'=>"user",
        'lastname'=>"user",
        'email'=>"user@gmail.com",
        'phone'=>"9845000000",
        'address'=>"chitwan",
        'password'=>hash::make('password'),
       ]]);
    }
}
