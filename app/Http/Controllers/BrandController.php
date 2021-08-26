<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
    function show(){
        $brandList = Brand::all();// select * from brands;
        return view('brand/list',['brands' => $brandList]);
    }
    
    function delete($id){
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('/brands');
    }

    function form($id = null){
        $brand = new Brand();
        if($id != null){
            //Select * from brands where id=$id
            $brand = Brand::findOrFail($id); 
        }
        return view('brand/form',['brand'=> $brand]);
    }

    function save(Request $request){
        $request->validate(
            [
                'name' => 'required|max:50'
            ]
        );
        $brand = new Brand();
        if(intval($request->id)>0){
            $brand = Brand::findOrFail($request->id);
        }

        $brand->name = $request->name;
        $brand->save();
        return redirect('/brands');
    }
}
