<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Categorie;

class ProductController extends Controller
{

    function __construct(){
        $this->middleware('auth');
    }
    function show(){
        $productList = Product::has('brand')->get();
        $productList = Product::has('categorie')->get();// select * from products;
        return view('product/list',['products' => $productList]);
    }
    
    function delete($id){
        $product = Product::find($id);
        $product->delete();
        return redirect('/products')->with('message','El producto fue borrado');
    }

    function form($id = null){
        $product = new Product();
        $brands = Brand::orderBy('name')->get();
        $categories = Categorie::orderBy('name')->get();
        if($id != null){
            //Select * from products where id=$id
            $product = Product::findOrFail($id); 
        }
        return view('product/form',[
            'product'=> $product,
            'brands'=> $brands,
            'categories'=> $categories
        ]);
    }

    function save(Request $request){
        $request->validate(
            [
                'name' => 'required|max:50',
                'cost' => 'required|numeric',
                'price' => 'required|numeric',
                'quantity' => 'required|numeric',
                'brand' => 'required|numeric',
                'categorie' => 'required|numeric'
            ]
        );


        $product = new Product();

        if(intval($request->id)>0){
            $product = Product::findOrFail($request->id);
        }

        $product->name = $request->name;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->brand_id = $request->brand;
        $product->categorie_id = $request->categorie;

        $product->save();
        
        return redirect('/products')->with('message','El producto fue guardado');
    }
}
