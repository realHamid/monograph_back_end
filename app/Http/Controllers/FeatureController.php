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

    public function view ( ){

        $features = feature::orderBy('id','desc')->get();

        foreach ($features as $key =>  $row){
            unset($row['created_at']);
            unset($row['updated_at']);
            unset($row['deleted_at']);
        }

        return json_encode($features);
    }


    public function delete( Request $request ){

        $deleted = feature::where(['id' => $request->id])->delete();

        if($deleted){
            return json_encode(['status' =>  'true' ]);
        }else {
            return json_encode(['status' =>  'false']);
        }
    }




}
