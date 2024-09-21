<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            
            'name'=>'admin',
            'usertype'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>hash::make('password'),
        ]);
    }
}
