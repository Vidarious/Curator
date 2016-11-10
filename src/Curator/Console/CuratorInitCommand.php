<?php

/**
 * Curator's curator:init command operations. This command is used for the initial
 * install of the Curator app.
 */

namespace Curator\Console;

use Illuminate\Console\Command;
use Illuminate\Database\Seeder;

class CuratorInitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'curator:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initializes the Curator user management application into your Laravel project.';

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
     * @return void
     */
    public function handle()
    {
        $this->info('The Curator is moving in ..' . PHP_EOL);

        //Copy Resources
        $this->call('curator:resource');

        //Perform Migrate
        $this->call('curator:migrate', ['--force' => TRUE]);

        //Perform Seeds
        $this->call('curator:seed', ['--force' => TRUE]);

        //Copy Curator resources to public directory.
        $this->createDirectories();
        $this->copyResources();

        $this->info('The Curator has settled in nicely!');
    }
}
