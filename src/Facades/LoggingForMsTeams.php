<?php

namespace Kiprasbiel\LoggingForMsTeams\Facades;

use Illuminate\Support\Facades\Facade;

class LoggingForMsTeams extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'logging-for-ms-teams';
    }
}
