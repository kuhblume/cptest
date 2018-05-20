<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call('GroupsTableSeeder');
        $this->call('JoinsTableSeeder');
        $this->call('MessagesTableSeeder');
        $this->call('UsersTableSeeder');
    }
}
