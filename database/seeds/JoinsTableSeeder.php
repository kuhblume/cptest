<?php

use Illuminate\Database\Seeder;

class JoinsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('joins')->truncate();

        DB::table('joins')->insert([
            [
                'group_id'      => '1',
                'user_id'       => '1',
            ],
            [
                'group_id'      => '1',
                'user_id'       => '2',
            ],
            [
                'group_id'      => '3',
                'user_id'       => '2',
            ],
        ]);
    }
}
