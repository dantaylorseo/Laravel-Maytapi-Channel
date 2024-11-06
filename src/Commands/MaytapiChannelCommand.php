<?php

namespace dantaylorseo\MaytapiChannel\Commands;

use Illuminate\Console\Command;

class MaytapiChannelCommand extends Command
{
    public $signature = 'laravel-maytapi-channel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
