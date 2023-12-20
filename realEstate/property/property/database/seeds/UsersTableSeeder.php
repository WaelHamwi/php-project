<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

//use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'full_name' => Str::random(10),
            'email' => Str::random(2).'@gmail.com',
            'password' => bcrypt('aa'),
        ]);

//        DB::table('user')->insert([
//            'full_name' => Str::random(10),
//            'email' => Str::random(2).'@gmail.com',
//            'password' => bcrypt('ss'),
//        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
