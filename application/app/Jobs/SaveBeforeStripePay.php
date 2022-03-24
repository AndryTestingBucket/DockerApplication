<?php

namespace App\Jobs;

use App\Http\Controllers\ApiController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Stripe;
use Illuminate\Support\Facades\Log;

class SaveBeforeStripePay implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The podcast instance.
     *
     * @var \App\Models\Stripe
     */

    protected $stripe;

    /**
     * Create a new job instance.
     *
     * @param \App\Models\Stripe
     *
     * @return void
     */
    public function __construct(Stripe $stripe)
    {
        $this->stripe = $stripe;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('Создан новый платеж' . $this->stripe->id. '.');

    }
}
