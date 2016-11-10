<?php

namespace Curator\Console;

use Illuminate\Console\Command;

class CuratorResourceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'curator:resource';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copies Curator\'s resources (css/js/font) to the registered public directory.';

    /**
    * List of Curator required directories for resources.
    *
    * @var string
    */
    protected $curatorRequiredDirectories = NULL;

    /**
    * List of Curator required directories for resources.
    *
    * @var string
    */
    protected $curatorResourceDirectories = NULL;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->curatorRequiredDirectories =
        [
            public_path() . '/css',
            public_path() . '/css/vendor',
            public_path() . '/css/vendor/curator',
            public_path() . '/js',
            public_path() . '/js/vendor',
            public_path() . '/js/vendor/curator',
            public_path() . '/font',
            public_path() . '/font/vendor',
            public_path() . '/font/vendor/curator'
        ];

        $this->curatorResourceDirectories =
        [
            __DIR__ . '/../Resources/css'  => public_path() . '/css/vendor/curator',
            __DIR__ . '/../Resources/js'   => public_path() . '/js/vendor/curator',
            __DIR__ . '/../Resources/font' => public_path() . '/font/vendor/curator'
        ];
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->createDirectories();
        $this->copyResources();
    }

    /**
     * Create necessary directories for Curator's resources.
     *
     * @return void
     */
    protected function createDirectories()
    {
        foreach($this->curatorRequiredDirectories as $directory)
        {
            if(! is_dir($directory))
            {
                mkdir($directory, 0777, TRUE);
            }
        }
    }

    /**
    * Copies Curator's resources to users public folder.
    *
    * @return void
    */
    protected function copyResources()
    {
        $this->info('Unpacking bags (Resources: CSS/JS/FONT) ..');

        $progressBar = $this->output->createProgressBar(count($this->curatorResourceDirectories));

        foreach($this->curatorResourceDirectories as $source => $destination)
        {
            $this->goCopy($source, $destination, 0777);
            $progressBar->advance();
        }

        $progressBar->finish();

        $this->info(PHP_EOL . 'Resources Copied!' . PHP_EOL);
    }

    /**
    * Copies files from source to destination.
    *
    * @return void
    */
    protected function goCopy($source, $destination, $permissions = 0755)
    {
        //File is copied here.
        if (is_file($source))
        {
            return copy($source, $destination);
        }

        //Create the sub-directory if necessary.
        if (! is_dir($destination))
        {
            mkdir($destination, $permissions);
        }

        $dir = dir($source);

        while(FALSE !== $item = $dir->read())
        {
            //Skip the pointers.
            if ($item == '.' || $item == '..') {
                continue;
            }

            $this->goCopy(
                $source . '/' . $item,
                $destination . '/' . $item,
                $permissions
            );
        }

        $dir->close();

        return TRUE;
    }
}
