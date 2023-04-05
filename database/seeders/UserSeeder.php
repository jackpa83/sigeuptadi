<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
       User::create([
             'name'=>'Lihany Bolivar',
            'email'=>'lbolivar@gmail.com',
            'password'=>bcrypt('Ja.010203')
       ])->assignRole('admin');
       User::create([
            'name'=>'Dervin Garcia',
            'email'=>'dgarcia@gmail.com',
            'password'=>bcrypt('Ja.010203')
        ])->assignRole('operador');
        User::create([
            'name'=>'Juan Martinez',
            'email'=>'jmartinez@gmail.com',
            'password'=>bcrypt('Ja.010203')
        ])->assignRole('estadistica');

    }
    
}
