<?php

namespace jimmirobles\ContpaqiLaravel\Commands;

use Illuminate\Console\Command;

class ContpaqiLaravelCommand extends Command
{
    public $signature = 'contpaqi-laravel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
