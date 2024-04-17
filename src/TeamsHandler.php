<?php

namespace Kiprasbiel\LoggingForMsTeams;

use Illuminate\Support\Facades\Http;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

class TeamsHandler extends AbstractProcessingHandler
{

    private string $url;

    public function __construct($url, $level = Logger::DEBUG, bool $bubble = true) {
        parent::__construct($level, $bubble);

        $this->url = $url;
    }

    protected function write(array|\Monolog\LogRecord $record): void {
        $cardArray = [
            '@type' => 'MessageCard',
            '@context' => 'http://schema.org/extensions',
            'themeColor' => config('logging.channels.teams.design.colours')[$record['level_name']],
            'summary' => $record['message'],
            'sections' => [[
                'activityTitle' => $record['message'],
                'activitySubtitle' => $record['level_name'] . ' on service **' . config('app.name') . '**',
                'activityImage' => config('logging.channels.teams.design.avatars')[$record['level_name']],
                'markdown' => true
            ]]
        ];

        if ($record['context']) {
            foreach ($record['context'] as $name => $value) {
                $cardArray['sections'][0]['facts'][] = [
                    'name' => $name,
                    'value' => $value,
                ];
            }
        }

        Http::withBody(json_encode($cardArray), 'application/json')
            ->post($this->url);
    }
}
