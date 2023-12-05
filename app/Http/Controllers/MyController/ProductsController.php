<?php

namespace App\Http\Controllers\MyController;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadImage;
use App\Models\Product_image;
use App\Models\Products;
use App\Models\Products_size;
use App\Models\Products_size_color;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{use UploadImage;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
 return view('admin.products',['products'=>Products::all()]);
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
    {   $image_name=array();
foreach ($request->image as $image) {
   array_push($image_name,  $this->uploadAndConvert($image));
}
        $product =new Products();
        $product->Name=$request->name;
        $product->Category_id=$request->category;
        $product->withSize=1;
        $product->Discount=$request->discount;
        if($request->discount >0)
{
    $discount =$request->price*($request->discount/100);
    $product->TotalPrice=$request->price-$discount;

}else{
    $product->TotalPrice=$request->price;

}

$product->Price=$request->price;
        $temp= $product->save();
if($temp)
        foreach ($request->items as $item)
        { $colors=explode(' ',$item['colors']);
            foreach ($item['size'] as $size) {
     $product_size= new Products_size();


     $product_size->Name=$size;
     $product_size->Product_id=$product->id;
        $product_size->save();
        foreach ($colors as $color) {
            $product_size_color= new Products_size_color();
   $product_size_color->Size_id = $product_size->id;

    $product_size_color->Product_id = $product->id;
    $product_size_color->Color_name = $color;

    $product_size_color->save();

       }

            }
        }
foreach ($image_name as $name)
{
   $image= new  Product_image();
$image->Product_id=$product->id;
    $image->url	=$name;
$image->save();

}

return 'sucsses';

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
