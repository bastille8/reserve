<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '田中',
            'email' => 'aaaaaa@aaaaaa',
            'password' => 'aaaaaaaaaa'
        ];
        DB::table('users')->insert($param);
    }
}
