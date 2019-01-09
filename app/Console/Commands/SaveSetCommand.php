<?php

namespace App\Console\Commands;

use App\Services\CardService;
use Illuminate\Console\Command;

class SaveSetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set:save {setCode}';

    /**
     * @var string
     */
    protected $description = 'Save all set cards to database via API';

    protected $service;

    public function __construct(CardService $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->service->saveSet($this->argument('setCode'));
    }
}
