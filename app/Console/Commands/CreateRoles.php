<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Bouncer;
use App\User;

class CreateRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roles:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $bar = $this->output->createProgressBar(3);

        $bar->start();
        $bar->advance();
        $admin = Bouncer::role()->firstOrCreate([
            'name' => 'admin',
            'title' => 'Administrator',
        ]);
        $bar->advance();
        $admin = Bouncer::role()->firstOrCreate([
            'name' => 'client',
            'title' => 'Client',
        ]);
        $bar->advance();
        $user = User::find(1);
        $user->assign('admin');
        $bar->advance();
        $user = User::find(2);
        $bar->advance();
        $user->assign('client');
        $bar->advance();
        $bar->finish();
    }
}
