<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => "Marcin Borowiec",
            'email' => "160738@stud.prz.edu.pl",
            'password' => Hash::make('qwerty'),
            'index' => "160738",
            'role' => "student",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ],

            [
                'name' => "Slawomir Jedziniak",
                'email' => "160841@stud.prz.edu.pl",
                'password' => Hash::make('qwerty'),
                'index' => "160841",
                'role' => "student",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "Admin",
                'email' => "admin@stud.prz.edu.pl",
                'password' => Hash::make('qwerty'),
                'index' => "100000",
                'role' => "admin",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]


        ]);
    }
}
