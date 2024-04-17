<?php

namespace Kiprasbiel\LoggingForMsTeams;

use Monolog\Logger;

class LoggingForMsTeams
{
    /**
     * Create a custom Monolog instance.
     *
     * @param array $config
     * @return Logger
     */
    public function __invoke(array $config): Logger {
        return (new Logger('teams-logger'))->pushHandler(new TeamsHandler($config['url'], Logger::DEBUG));
    }
}
