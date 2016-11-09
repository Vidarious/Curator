<?php

namespace Curator\Console;

use Illuminate\Console\Command;

class CuratorMigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'curator:migrate {--force : Force Curator to migrate and delete Laravels default migrations.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrates database with Curator\'s migrations.';

    /**
     * Array of Laravel's default auth migration files. Last modified to account for Laravel v5.316 migrations.
     *
     * @var string
     */
    protected $laravelMigrations =
    [
        'database/migrations/2014_10_12_000000_create_users_table.php',
        'database/migrations/2014_10_12_100000_create_password_resets_table.php'
    ];

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
        $this->cleanUp();

        $this->doMigrate();
    }

    /**
     * Checks for existing default Laravel auth migrations and removes them for Curator's improved verisons.
     *
     * @return void
     */
    protected function cleanUp()
    {
        if($this->option('force') || $this->confirm('> Delete Laravel\'s default Auth migrations? [Highly Recommened]', TRUE))
        {
            $progressBar = $this->output->createProgressBar(count($this->laravelMigrations));

            $this->info('Cleaning up Laravel migrations ..');

            foreach($this->laravelMigrations as $file)
            {
                if(is_file(base_path($file)))
                {
                    unlink(base_path($file));

                    $progressBar->advance();
                }
            }

            $progressBar->finish();

            $this->comment(PHP_EOL . 'Cleanup Successful.');

            if($this->option('force'))
            {
                echo PHP_EOL;
            }
        }
        else
        {
            $this->comment('IMPORTANT: Do not to migrate Laravel\'s default Auth migrations as they will conflict with the Curators.');
        }
    }

    /**
     * Runs the migrate command for Curator's migration files (database/migrations/curator).
     *
     * @return void
     */
    protected function doMigrate()
    {
        if($this->option('force') || $this->confirm('> Do you want to run Curator\'s migrations? [y|N]', true))
        {
            $this->info('Migrating Curator\'s migrations ..');

            $this->call('migrate', ['--path' => $this->curatorMigrationPath]);

            $this->comment('Migrations Successful.');
        }
    }
}
