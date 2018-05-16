<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('groups')->truncate();

        DB::table('groups')->insert([
            [
                'group_name'      => 'TestA',
            ],
            [
                'group_name'      => 'TestB',
            ],
            [
                'group_name'      => 'TestC',
            ],
        ]);
    }
}
