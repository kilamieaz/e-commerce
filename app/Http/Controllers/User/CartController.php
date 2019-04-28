<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;
use App\User;
use Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('carts', 'wishlists')->find(Auth()->user()->id);
        $carts = Cart::where('user_id', Auth()->user()->id)->get();
        return view('user.cart', compact('carts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = Cart::firstOrCreate([
            'user_id' => \Auth::user()->id,
            'product_id' => $request->product_id,
            'quantity' => 1,
            'total' => $request->price,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $cart = Cart::find($id);

            if ($request->increase) {
                $cart->increment('quantity');
            } else {
                $cart->decrement('quantity');
            }
            $cart->update([
                'total' => $cart->quantity * $request->price,
            ]);
            $quantity = $cart->quantity;
            $total = $cart->total;
            $cart_total = Auth::user()->carts()->sum('total');
            $sum = Auth::user()->carts()->sum('quantity');

            return response()->json(compact('quantity', 'total', 'cart_total', 'sum'));
            // return response()->json(['quantity' => $quantity]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $userCart)
    {
        $userCart->delete();
    }
}
