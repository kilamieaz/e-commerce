<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Cart;
use App\Transaction;

class PaypalSuccessController extends Controller
{
    public function index(Request $request)
    {
        $provider = new ExpressCheckout;
        $token = $request->token;
        $PayerID = $request->PayerID;
        $response = $provider->getExpressCheckoutDetails($token);
        $invoiceId = $response['INVNUM'] ?? uniqid();
        $carts = Cart::where('user_id', Auth()->user()->id)->get();
        $data = Cart::cartData($invoiceId, $carts);
        $response = $provider->doExpressCheckoutPayment($data, $token, $PayerID);

        foreach ($carts as $item) {
            $transaction = Transaction::create([
                'user_id' => Auth()->user()->id,
                'product_id' => $item->product_id,
                'total' => $item->total,
                'status' => 0,
                'quantity' => $item->quantity,
            ]);
            //delete cart
            $item->delete();
        }
        // dd($response);
        return 'Order completed';
    }
}
