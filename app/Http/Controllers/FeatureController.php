<?php

namespace App\Http\Controllers;

use App\feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    //

    public function save( Request $request ){

        $insert = feature::create([
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
