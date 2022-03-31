<?php

namespace App\Http\Controllers;

use App\categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function save( Request $request ){

        $insert = categories::create([
            'name'  => $request->name,
            'date'  => $request->date,
            'note'  => $request->note,
        ]);

        if($insert){
            return json_encode(['status' =>  'true' ]);
        }else {
            return json_encode(['status' =>  'false']);
        }
    }

}
