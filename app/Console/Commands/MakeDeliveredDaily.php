<?php

namespace App\Console\Commands;

use App\Services\OrderService;
use Illuminate\Console\Command;

class MakeDeliveredDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:delivered';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make orders to delivered at 12:00am every night';

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
     * @return int
     */
    public function handle()
    {
        $orderservice = new OrderService;
        return $orderservice->orderMoveToDelivered();
    }
}
