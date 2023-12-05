<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Products;
use Illuminate\Http\Request;

use Session;

use Stripe;



class StripePaymentController extends Controller

{

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripe()

    {  $Cart= \Illuminate\Support\Facades\Session::get('cart') != null ? Session::get('cart'):Array() ;
        $price=0;
    $order=new Order();
        foreach ($Cart as $cart)
        {
            $price+= $cart['price'];
        }
        $order->TotalPrice=$price;
$order->save();
        foreach ($Cart as $cart)
        {$order_product=new Order_Products();
$order_product->Order_id=$order->id;
$order_product->Product_id =$cart['id'];
        $order_product->save();
        }


        return view('admin.stripe',['order'=>$order]);

    }



    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */
    public function stripePost(Request $request)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {

            Stripe\Charge::create([
                "amount" => $request->TotalPrice,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "afefOrder."

            ]);
       \Illuminate\Support\Facades\Session::flush();
        }
        catch (\Exception $exception)
        { Session::flash('error', $exception->getMessage());}
        Session::flash('success', 'Payment successful!');
        return back();
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
