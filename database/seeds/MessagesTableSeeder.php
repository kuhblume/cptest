<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->truncate();

        DB::table('messages')->insert([
            [
                'group_id'      => '1',
                'user_id'       => '1',
                'message_body' => 'test1',
                'image_path'=>'',
            ],
            [
                'group_id'      => '1',
                'user_id'       => '2',
                'message_body' => 'test2',
                'image_path'=>'',
            ],
            [
                'group_id'      => '3',
                'user_id'       => '2',
                'message_body' => 'test3',
                'image_path'=>'',
            ],
        ]);
    }
}
