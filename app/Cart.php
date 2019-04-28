<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $guarded = [];
    protected $with = ['user', 'product'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function cartData($invoiceId, $data_carts)
    {
        $data = [];
        $data['items'] = [];
        $carts = $data_carts;
        foreach ($carts as $key => $value) {
            $itemDetail = [
                'name' => $value->product->name,
                'price' => $value->product->price,
                'qty' => $value->quantity
            ];
            $data['items'][] = $itemDetail;
        }

        $data['invoice_id'] = $invoiceId;
        $data['invoice_description'] = 'invoice';
        $data['return_url'] = route('paypal-success.index');
        $data['cancel_url'] = url('/do_action');

        $total = Auth::user()->carts()->sum('total');
        $data['total'] = $total;
        return $data;
    }
}
