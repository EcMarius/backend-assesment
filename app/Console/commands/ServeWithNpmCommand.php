<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ServeWithNpmCommand extends Command
{
    protected $signature = 'serve:npm';

    protected $description = 'Start the NPM service server and the PHP development server.';

    public function handle()
    {
        $this->call('npm', ['run', 'serve']);
        $this->call('serve');
    }
}
