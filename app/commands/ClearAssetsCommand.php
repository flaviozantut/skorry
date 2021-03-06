<?php

use Illuminate\Console\Command;

class ClearAssetsCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'assets:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove generated assets automatically';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        File::deleteDirectory(public_path().'/assets');
        $this->info('Assets cleared!');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }
}
