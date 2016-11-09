<?php

/**
 * Curator's curator:init command operations. This command is used for the initial
 * install of the Curator app.
 */

namespace Curator\Console;

use Illuminate\Console\Command;
use Illuminate\Database\Seeder;
use Validator;

class InitCuratorCommand extends Command
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
     * Array of Curator's seed files.
     *
     * @var array
     */
    protected $curatorSeeds =
    [
        'StatusTableSeeder',
        'FlagsTableSeeder',
        'RolesTableSeeder',
        'PermissionsTableSeeder',
        'UsersTableSeeder',
        'ActivityTableSeeder',
        'SettingsTableSeeder',
        'UserRoleTableSeeder',
        'UserFlagTableSeeder',
        'RolePermissionTableSeeder'
    ];

    /**
     * Array of Curator's stubs.
     *
     * @var array
     */
     protected $curatorStubs =
     [
         'UserRoleTableSeeder',
         'UserFlagTableSeeder',
         'UsersTableSeeder',
         'ActivityTableSeeder'
     ];

    /**
     * Super Admin account username.
     *
     * @var string
     */
    protected $adminUsername = NULL;

    /**
     * Super Admin account email.
     *
     * @var string
     */
    protected $adminEmail = NULL;

    /**
     * Super Admin account password.
     *
     * @var string
     */
    protected $adminPassword = NULL;

    /**
     * Super Admin account given name.
     *
     * @var string
     */
    protected $adminGivenName = NULL;

    /**
     * Super Admin account family name.
     *
     * @var string
     */
    protected $adminFamilyName = NULL;

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
     * @return void
     */
    public function handle()
    {
        $this->info('The Curator is moving in ..');

        $this->cleanUp();

        $this->doMigrate();

        $this->doSeed();

        $this->info('The Curator has settled in nicely!');
    }

    /**
     * Checks for existing default Laravel auth migrations and removes them for Curator's improved verisons.
     *
     * @return void
     */
    protected function cleanUp()
    {
        if($this->confirm('> Delete Laravel\'s default Auth migrations? [Highly Recommened]', TRUE))
        {
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

            echo PHP_EOL . PHP_EOL;
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
        if($this->confirm('> Do you want to run Curator\'s migrations? [y|N]', true))
        {
            $this->call('migrate', ['--path' => $this->curatorMigrationPath]);

            $this->comment('Migrations Successful.' . PHP_EOL);
        }
    }

    /**
     * Runs the seed command for Curator's seed files This sets up the initial settings.
     *
     * @return void
     */
    protected function doSeed()
    {
        $this->info('** Seeding is required for initial setup **');

        if($this->confirm('> Do you want to run Curator\'s seeds? [y|N]', true))
        {
            $this->gatherDetails();

            $this->info('Seeding database with inital setup configuration data.');

            $progressBar = $this->output->createProgressBar(count($this->curatorSeeds)+1);

            $this->createSeedsFromStubs();

            $progressBar->advance();

            foreach($this->curatorSeeds as $seed)
            {
                include __DIR__ . '/../Database/Seeds/' . $seed . '.php';

                $this->call('db:seed', ['--class' => $seed]);

                $progressBar->advance();
            }

            $progressBar->finish();

            $this->comment(PHP_EOL . 'Seeds Successful.' . PHP_EOL);
        }
    }

    /**
     * Compile the seed stubs to copy them over to the migrations folder.
     *
     * @return void
     */
     protected function createSeedsFromStubs()
     {
         foreach($this->curatorStubs as $stub)
         {
             file_put_contents(
                 __DIR__.'/../Database/Seeds/' . $stub . '.php',
                 $this->compileStub($stub)
             );
         }
     }

     /**
      * Compile the Curator UsersTableSeeder stub and return it.
      *
      * @return string
      */
     protected function compileStub($stub)
     {
         $tableSeeder = file_get_contents(__DIR__.'/../Database/Seeds/Stubs/' . $stub . '.stub');

         $tableSeeder = str_replace('{{username}}', $this->adminUsername, $tableSeeder);
         $tableSeeder = str_replace('{{email}}', $this->adminEmail, $tableSeeder);
         $tableSeeder = str_replace('{{password}}', $this->adminPassword, $tableSeeder);
         $tableSeeder = str_replace('{{given_name}}', $this->adminGivenName, $tableSeeder);
         $tableSeeder = str_replace('{{family_name}}', $this->adminFamilyName, $tableSeeder);

         return $tableSeeder;
     }

    /**
     * Gathers user details for the god admin account.
     *
     * @return void
     */
    protected function gatherDetails()
    {
        $this->info('The Curator needs some details about you to create the main Admin account ..');
        $this->comment('** This account cannot be deleted and will have full permissions **');

        $this->adminUsername = $this->ask('Choose a username: ', 'SysAdmin');

        $emailValidate = TRUE;

        //Ask for e-mail.
        while($emailValidate === TRUE)
        {
            $this->adminEmail = $this->ask('What is your e-mail address?');

            if(! Validator::make([$this->adminEmail ], ['email'])->fails())
            {
                $emailValidate = FALSE;
            }
            else
            {
                $this->error('Invalid e-mail address. Try again.');
            }
        }

        $passwordValidate = TRUE;

        //Ask for password.
        while($passwordValidate === TRUE)
        {
            $this->adminPassword = $this->secret('Enter your password: ');
            $repeatPassword      = $this->secret('Enter your password again: ');

            $passwordValidate = TRUE;

            if(! Validator::make([$this->adminPassword], ['min:6'])->fails() && $this->adminPassword === $repeatPassword)
            {
                $passwordValidate = FALSE;
            }
            else
            {
                $this->error('Invalid password. Min length: 6 | Passwords must match.');
            }
        }

        //Ask for Given name.
        $this->adminGivenName = $this->ask('What is your first (given) name?');

        //Ask for Family name.
        $this->adminFamilyName = $this->ask('What is your last (family) name?');
    }
}
