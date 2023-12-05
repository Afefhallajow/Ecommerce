<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class marketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    return view('admin.market',['products'=>Products::all()]);

    }


    public function getproduct($id)
    {
$product=Products::where('id',$id)->first();
//return $product->sizes[0]->colors;
        return view('admin.product-details',['products'=>Products::where('Category_id',$product->Category_id)->get(),'product'=>$product]);

    }
public function AddToCart(Request $request)
{   $Cart= Session::get('cart') != null ? Session::get('cart'):Array() ;

$opj=['id'=>$request->id,'name'=>$request->name,'price'=>$request->price,'discount'=>$request->discount,'size'=>$request->size,'color'=>$request->color,'quantity'=>$request->quantity];
array_push($Cart,$opj);
Session::put('cart',$Cart);
return Session::get('cart')
    ;
}
public function showCart()
{  $Cart= Session::get('cart') != null ? Session::get('cart'):Array() ;
 $price=0;
 foreach ($Cart as $cart)
 {
    $price+= $cart['price'];
 }

    return view('admin.product-cart',['products'=>$Cart,'price'=>$price]);
}
public function removeFromCart($id)
{$Cart= Session::get('cart') != null ? Session::get('cart'):Array() ;
unset($Cart[$id]);
    Session::put('cart',$Cart);
return \redirect()->back();

}
    /**
     * Show the form for creating a new resource.
     */
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
