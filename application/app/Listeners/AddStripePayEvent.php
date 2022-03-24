<?php

namespace App\Listeners;

use App\Events\StripePayEvent;
use App\Jobs\SaveBeforeStripePay;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Stripe;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class AddStripePayEvent
{
    use Dispatchable;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\StripePayEvent  $event
     * @return void
     */
    public function handle(StripePayEvent $event)
    {

        $client = new \GuzzleHttp\Client();
        //secret_key - вариация пароля(она же дает нам токен с последующей идентификация пользователя)

        try {
            $res = $client->request('POST',
                'https://api.stripe.com/v1/payment_intents',
                [
                    'form_params'=>$event->key,
                    'auth' =>
                        [
                            env('STRIPE_SECRET_KEY'),
                            ''
                        ]
                ]
            );


            $obj = json_decode($res->getBody()->getContents());

            $stripe = new Stripe();

            $stripe->client_id = $obj->id;

            $stripe->client_secret = $obj->client_secret;

            $stripe->object = $obj->object;
            $stripe->amount = $obj->amount;

            $stripe->capture_method = $obj->capture_method;
            $stripe->confirmation_method = $obj->confirmation_method;
            $stripe->created = $obj->created;
            $stripe->currency = $obj->currency;
            $stripe->payment_method_types = $obj->payment_method_types[0];

            $stripe->save();

            $getStripePay = new ApiController();
            return $getStripePay->getStripePay($stripe);


        }  catch (Error $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }

    }
}
