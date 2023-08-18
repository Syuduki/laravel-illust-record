<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * ユーザーテーブル 
     * 
     * @author Syuduki
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'テストユーザー',
            'login_id' => 'user1',
            'password' => Hash::make('user12345'),
            'email' => 'illustRecord@example.com',
            'icon_path' => '',
        ]);
    }
}
