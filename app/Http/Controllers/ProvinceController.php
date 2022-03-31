<?php

namespace App\Http\Controllers;

use App\provinces;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{

    public function save( Request $request ){

        $insert = provinces::create([
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
