<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;

use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a list of the resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout');
    }

    /**
     * Store a newly created resource in Storage
     * 
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
        $contents = Cart::content()->map(function ($item) {
            return $item->model->slug.', '.$item->qty;
        });

        try {
            $charge = Stripe::charges()->create([
                'amount' => Cart::total() / 100,
                'currency' => 'CAD',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' => [
                    // change to Order
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count(),
                ]
            ]);

            // SUCCESSFUL
            Cart::instance('default')->destroy();
            return redirect()->route('confirmation.index')->with('success_message', 'Thank you! Your payment has been received successfully!'); 
        } catch(CardErrorException $e) {
            return back()->withErrors('Error!'. $e->getMessage());
        }
    }
}
