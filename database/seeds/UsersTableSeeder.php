<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Vu Phan',
            'email' => 'vuphan@gmail.com',
            'password' => Hash::make('11111111'),
        ]);
    }
}
