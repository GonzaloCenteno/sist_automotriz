<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name'         => 'GONZALO JAVIER CENTENO ZAPATA',
            'email'        => 'gzlcentenoz@gmail.com',
            'password' 	   =>  Hash::make('123456'),
            'rol'          =>  'ADM',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name'         => 'MICHAEL BEDREGAL JALSOVEC',
            'email'        => 'mike@gmail.com',
            'password'     =>  Hash::make('123456'),
            'rol'          =>  'TEC',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
    }
}
