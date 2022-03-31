<?php

namespace App\Http\Controllers;

use App\districts;
use App\provinces;
use Illuminate\Http\Request;

class DistrictController extends Controller
{


    public function listProvince(){
        $province = provinces::orderBy('id','desc')->get();

        foreach ( $province as $item) {
            unset($item['created_at'],$item['updated_at'],$item['deleted_at'],$item['img'],$item['date'],$item['note']);
        }

        return json_encode($province);

    }


    public function save( Request $request ){

        $insert = districts::create([
            'province_id'   => $request->province_id,
            'name'          => $request->name,
            'date'          => $request->date,
            'note'          => $request->note,
        ]);

        if($insert){
            return json_encode(['status' =>  'true' ]);
        }else {
            return json_encode(['status' =>  'false']);
        }

    }

    public function view (){

        $features = districts::orderBy('id','desc')->get();

        foreach ($features as $key =>  $row){
            $row['province_name'] = $row->provinces->name;
            unset($row['created_at'],$row['updated_at'],$row['deleted_at'],$row['provinces']);
        }

        return json_encode($features);
    }



}
