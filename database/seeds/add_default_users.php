<?php

use Illuminate\Database\Seeder;
// use Bouncer;

class add_default_users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();
        $user = DB::table('users')->insert([
            'email' => 'admin@icasa.com.mx',
            'name' => 'Admin',
            'password' => 'admin',
        ]);
        $user = DB::table('users')->insert([
            'email' => 'cliente@icasa.com.mx',
            'name' => 'Cliente 1',
            'password' => 'cliente',
        ]);
        // $admin = Bouncer::role()->firstOrCreate([
        //     'name' => 'admin',
        //     'title' => 'Administrator',
        // ]);
        // $user->assign('admin');
    }
}
