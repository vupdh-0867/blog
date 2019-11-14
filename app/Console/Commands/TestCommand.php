<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:cmd';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.chatwork.com/v2/me");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'X-ChatWorkToken: baceae9645c18d946c85c703e7855fb3',
        ));
        $resp = curl_exec($ch);
        print $resp;
    }
}
