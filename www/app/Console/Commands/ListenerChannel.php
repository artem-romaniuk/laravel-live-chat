<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class ListenerChannel extends Command
{
    protected $signature = 'command:listener';

    protected $description = 'Command listener channel';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Redis::psubscribe(['*'], function ($message) {
            echo $message;
        });
    }
}
