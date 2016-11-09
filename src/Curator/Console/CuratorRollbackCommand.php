<?php

namespace Curator\Console;

use Illuminate\Console\Command;

class CuratorRollbackCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'curator:rollback';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rolls back the Curator tables in your database.';

    /**
     * Laravel path for Curator's migrations.
     *
     * @var string
     */
    protected $curatorMigrationPath = NULL;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        //Create the proper migration page for the migrate command.
        $this->curatorMigrationPath = str_replace('/Console', '/Database/Migrations', __DIR__);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('migrate:rollback', ['--path' => $this->curatorMigrationPath]);
    }
}
