<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1 , 997) as $value){
            DB::table('users')->insert([
                'name'=> $faker->name(),
                'email'=> $faker->unique()->safeEmail(),
                'password'=>Hash::make($faker->password()),
                'email_verified_at'=> now(),
                'remember_token'=>'NULL',
                'created_at'=> now(),
                'updated_at'=> now(),
            ]);
        }

        
        //Basic method
        // DB::table('users')->insert([
        //     'name'=> 'Avhi',
        //     'email'=> 'avhi12@gmail.com',
        //     'password'=>'123456789',
        //     'email_verified_at'=> now(),
        //     'remember_token'=>'NULL',
        //     'created_at'=> now(),
        //     'updated_at'=> now(),
        // ]);

        //Alternate Method
        // DB::table('users')->insert([
        //     'name'=> Str::random(10),
        //     'email'=> Str::random(10).'@gmail.com',
        //     'password'=>Hash::make('password'),
        //     'email_verified_at'=> now(),
        //     'remember_token'=>'NULL',
        //     'created_at'=> now(),
        //     'updated_at'=> now(),
        // ]);
        //alternate Method
        // foreach(range(1 , 5) as $value){
        //     DB::table('users')->insert([
        //         'name'=> Str::random(10),
        //         'email'=> Str::random(10).'@gmail.com',
        //         'password'=>Hash::make('password'),
        //         'email_verified_at'=> now(),
        //         'remember_token'=>'NULL',
        //         'created_at'=> now(),
        //         'updated_at'=> now(),
        //     ]);
        // }
        
        
    }
}
