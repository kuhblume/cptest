<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name'      => 'userA',
                'email'       => 'aaa@bbb.ccc',
                'password' => '$2y$10$gM4EU/xhjufJdLPwgyBGkOVWVszXeHtOJdBb.tEt/ibGzwSIGKKsa'//aaabbbccc
            ],
            [
                'name'      => 'userB',
                'email'       => 'ppp@qqq.rrr',
                'password' => '$2y$10$.pbVTVDK5sxL4QkyZlgca.y5eWG7TDz1Z6N8ShNAKD8VdBNeMTSRC'//pppqqqrrr
            ],
            [
                'name'      => 'userC',
                'email'       => 'xxx@yyy.zzz',
                'password' => '$2y$10$D1j2y0h9shdpmdMSGYWSyeZyScRIk11xmS43E7jD.TJCQi95dSSLy'//xxyyyzzz
            ],
        ]);
    }
}
