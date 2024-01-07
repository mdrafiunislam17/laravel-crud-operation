<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller
{
   public function index(){
    $products = product::latest()->paginate(5);

    return view("products.index",["products"=>$products ]);
   }
   public function create(){
    return view("products.create");
   }

   
   public function store(Request $request){
    //Validation data
    $request->validate([
        "name"=>"required",
        "description"=>"required|string",
        "image"=>"required|mimes:jpeg,jpe,png,gif|max:10000"
    ]);


    //dd($request->all());
    //Upload Image
    $imageName = time().".".$request->image->extension();
    $request->image->move(public_path("products"),$imageName);
    //dd($imageName);
    $product = new product;
    $product->image = $imageName;
    $product->name = $request->name;
    $product->description = $request->description;

    $product->save();
    return back()->withSuccess("Product Creates !!!!");

   }
   public function edit($id){
    $product = product::where("id",$id)->first();
    return view("products.edit", ["product" => $product]);
   }
   public function update(Request $request,$id){
   
    //Validation data
    $request->validate([
        "name"=>"required",
        "description"=>"required",
        "image"=>"nullable|mimes:jpeg,jpe,png,gif|max:10000"
    ]);
    $product = product::where("id",$id)->first();

    if(isset($request->image)){
    //Upload Image
    $imageName = time().".".$request->image->extension();
    $request->image->move(public_path("products"),$imageName);
    $product->image = $imageName;
    
    }

   //dd($imageName);
   
    $product->name = $request->name;
    $product->description = $request->description;

    $product->save();
    return back()->withSuccess("Product Update !!!!");

   }

   public function destroy($id){
    $product = product::where("id",$id)->first();
    $product->delete();
    return back()->withSuccess("Product Delete !!!!");
   }
   public function show($id){
    $product = product::where("id",$id)->first();
    return view("products.show",["product"=>$product]);
   }

}
