<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
    function show(){
        $categorieList = Categorie::all();// select * from categories;
        return view('categorie/list',['categories' => $categorieList]);
    }
    
    function delete($id){
        $categorie = Categorie::find($id);
        $categorie->delete();
        return redirect('/categories');
    }

    function form($id = null){
        $categorie = new Categorie();
        if($id != null){
            //Select * from brands where id=$id
            $categorie = Categorie::findOrFail($id); 
        }
        return view('categorie/form',['categorie'=> $categorie]);
    }

    function save(Request $request){
        $request->validate(
            [
                'name' => 'required|max:50',
                'description' => 'required|max:100'
            ]
        );
        $categorie = new Categorie();
        if(intval($request->id)>0){
            $categorie = Categorie::findOrFail($request->id);
        }

        $categorie->name = $request->name;
        $categorie->description = $request->description;
        $categorie->save();
        return redirect('/categories');
    }
}
