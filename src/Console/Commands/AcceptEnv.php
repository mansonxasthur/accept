<?php

namespace MX13\Accept\Console\Commands;

use Illuminate\Console\Command;

class AcceptEnv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'accept:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Accept options to .env.';

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
        file_put_contents(
            base_path('.env'),
            file_get_contents(__DIR__.'/Env/stubs/env.stub'),
            FILE_APPEND
        );
    }
}
