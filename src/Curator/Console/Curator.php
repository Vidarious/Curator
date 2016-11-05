<?php

namespace Curator\Console;

use Illuminate\Console\Command;

class Curator extends Command
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
     * @return mixed
     */
    public function handle()
    {
        $this->info('The Curator is unpacking her bags ..');
    }
}
