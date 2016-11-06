<?php

namespace Curator\Console;

use Illuminate\Console\Command;

class CuratorInit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'curator:init {--force : Force Curator to override existing Curator data}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initializes the Curator user management application into your Laravel project.';


    /**
     * Array of Laravel's default auth migration files.
     * Last modified to account for Laravel v5.316 migrations.
     * @var string
     */
    protected $laravelMigrations =
        [
            'database/migrations/2014_10_12_000000_create_users_table.php',
            'database/migrations/2014_10_12_100000_create_password_resets_table.php'
        ];

    /**
     * Array of Curator's migration files.
     *
     * @var string
     */
    protected $curatorMigrations =
        [
            '2016_10_19_223416_create_status_table.php',
            '2016_10_20_193702_create_users_table.php',
            '2016_10_20_203139_create_flags_table.php',
            '2016_10_20_204349_create_roles_table.php',
            '2016_10_20_215801_create_permissions_table.php',
            '2016_10_21_184917_create_settings_table.php',
            '2016_10_21_193232_create_activity_table.php',
            '2016_10_21_201637_create_user_flag_table.php',
            '2016_10_21_203234_create_user_role_table.php',
            '2016_10_21_203811_create_user_permission_table.php',
            '2016_10_21_204409_create_role_permission_table.php'
        ];

    /**
     * Laravel path for Curator's migrations.
     *
     * @var string
     */
    protected $curatorMigrationPage = 'database/migrations/curator';

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
        $this->info('The Curator is moving in ..' . PHP_EOL);

        $this->cleanUp();
        $this->createDirectories();
        $this->unpackMigrations();
        $this->doMigrate();

        $this->info('The Curator has settled in nicely!');
    }

    /**
     * Checks for existing default Laravel auth migrations and removes them for Curator's improved verisons.
     *
     * @return void
     */
    protected function cleanUp()
    {
        $this->info('#1. Tossing out Laravel\'s default Auth migrations ..');

        $progressBar = $this->output->createProgressBar(count($this->laravelMigrations));

        foreach($this->laravelMigrations as $file)
        {
            if(is_file(base_path($file)))
            {
                unlink(base_path($file));

                $progressBar->advance();
            }
        }

        $progressBar->finish();
    }

    /**
     * Create the necessary directories for the Curator application
     *
     * @return void
     */
    protected function createDirectories()
    {
        //Migrations
        if(! is_dir(base_path($this->curatorMigrationPage)))
        {
            mkdir(base_path($this->curatorMigrationPage), 0755, true);
        }
    }

    /**
     * Copies Curator's migration files to Laravel's migration folder: database/migrations.
     * This will allow users to 'php artisan migrate' Curator's migrations along with
     * their own migrations.
     *
     * @return void
     */
    protected function unpackMigrations()
    {
        $this->info(PHP_EOL . PHP_EOL . '#2. Unpacking the Curator\'s migrations ..');

        $progressBar = $this->output->createProgressBar(count($this->curatorMigrations));

        //Copy Curator migration files.
        foreach($this->curatorMigrations as $file)
        {
            //Check if file exists. If true, skip copy (--force option overides).
            if($this->option('force') || ! is_file(base_path($this->curatorMigrationPage . '/' . $file)))
            {
                copy(__DIR__ . '../../Database/Migrations/' . $file, base_path($this->curatorMigrationPage . '/' . $file));
            }
            else
            {
                $notice = PHP_EOL
                        . PHP_EOL . 'Some of Curator migrations already exist, these were not unpacked.'
                        . PHP_EOL . 'Use --force to overide existing Curator migrations.';
            }

            $progressBar->advance();
        }

        $progressBar->finish();

        //Check for notice and display it.
        if(!empty($notice))
        {
            $this->comment($notice);
        }
        else
        {
            $this->comment(''); //Output formatting correction.
        }
    }

    /**
     * Runs the migrate command for Curator's migration files (database/migrations/curator).
     *
     * @return void
     */
    protected function doMigrate()
    {
        if($this->confirm('> Do you want to run Curator\'s migrations? [y|N]', true))
        {
            $this->callSilent('migrate', ['--path' => $this->curatorMigrationPage]);

            $this->comment('Migrations OK.' . PHP_EOL);
        }
    }
}
