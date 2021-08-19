<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('variables')->truncate();
        DB::table('variables')->insert([
            'name' => 'variable 1',
            'project_id' => 1,
            'live' => 0,
            'read_only' => 1,
            'write_only' => 0,
            'units' => "kW",
            'reference' => uniqid()
        ]);
    }
}
