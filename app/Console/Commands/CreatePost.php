<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Model\Post;

class CreatePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:create';

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
        Post::create(
            [
              'title' => 'cron',
              'content' => 'content cron',
              'user_id' => 1,
            ]
          );
    }
}
