<?php

namespace Kenini;

use Illuminate\Support\ServiceProvider;
use Kenini\Console\RepositoryMakeCommand;
use Kenini\Console\RepositoryInterfaceMakeCommand;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $commands = [
        RepositoryMakeCommand::class,
        RepositoryInterfaceMakeCommand::class
    ];
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }
}
