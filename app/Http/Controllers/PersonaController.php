<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonaController extends Controller
{
    function mostrar($id = null){
        if ($id == null) {
            return "Debe ingresar un valor";
        }else{
            return 'id = '.$id;
        }
    }
}
