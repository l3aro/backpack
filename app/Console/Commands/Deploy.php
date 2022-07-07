<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\PhpExecutableFinder;
use Symfony\Component\Process\Process;

class Deploy extends Command
{
    protected $signature = 'deploy';

    protected $description = 'Deploy project using Laravel Envoy';

    public function handle()
    {
        $startTime = microtime(true);
        $process = new Process([
            (new PhpExecutableFinder)->find(),
            'vendor/bin/envoy',
            'run',
            'deploy',
        ]);
        $process->run(fn ($type, $buffer) => $this->info($buffer));
        if (! $process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        $this->newLine();
        $executionTime = microtime(true) - $startTime;
        $executionTime = round($executionTime);
        $this->info("**Deploy successfully after $executionTime seconds**");

        return 0;
    }
}
