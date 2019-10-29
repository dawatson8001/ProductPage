<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;

class PaymentController extends Controller 
{

    /*
    * @return \Illuminate\Http\Response
    */
    public function postPayment(Request $request, $name, $price)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount" => str_replace('.', '', $price),
            "currency" => 'GBP',
            "source" => $request->stripeToken,
            "description" => $name
        ]);

        return back();

    }
}
