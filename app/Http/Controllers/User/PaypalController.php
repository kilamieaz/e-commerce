<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Cart;
use Auth;

class PaypalController extends Controller
{
    public function index()
    {
        $provider = new ExpressCheckout;
        $invoiceId = uniqid();
        $carts = Cart::where('user_id', Auth()->user()->id)->get();
        $data = Cart::cartData($invoiceId, $carts);

        $response = $provider->setExpressCheckout($data);
        return redirect($response['paypal_link']);
        // //give a discount of 10% of the order amount
        // $data['shipping_discount'] = round((10 / 100) * $total, 2);
    }
}
