<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->truncate();

        DB::table('images')->insert([
            [
                'message_id'      => '1',
                'image_path'       => '1',
            ],
            [
                'message_id'      => '1',
                'image_path'       => '2',
            ],
            [
                'message_id'      => '3',
                'image_path'       => '2',
            ],
        ]);
    }
}
