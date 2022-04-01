<?php

namespace App\Http\Controllers;

use App\categories;
use App\districts;
use App\feature;
use App\location_assets;
use App\locations;
use App\provinces;
use Illuminate\Http\Request;

class LocationController extends Controller
{


    public function get_provinces(){

        $provinces = provinces::orderBy('id','desc')->get();

        foreach ( $provinces as $row  ){
            unset($row['img'],$row['note'],$row['date'],$row['created_at'],$row['updated_at'],$row['deleted_at']);
        }

        return json_encode($provinces);
    }


    public function get_districts ( Request $request ){

        $district = districts::where(['province_id' => $request->province_id])->orderBy('id','desc')->get();

        foreach ( $district as $row  ){
            unset($row['img'],$row['note'],$row['date'],$row['created_at'],$row['updated_at'],$row['deleted_at'],$row['province_id']);
        }

        return json_encode($district);
    }

    public function get_category(){

        $categories = categories::orderBy('id','desc')->get();

        foreach ( $categories as $row  ){
            unset($row['note'],$row['date'],$row['created_at'],$row['updated_at'],$row['deleted_at']);
        }

        return json_encode($categories);
    }

    public function get_feature(){

        $feature = feature::orderBy('id','desc')->get();

        foreach ( $feature as $row  ){
            unset($row['note'],$row['date'],$row['created_at'],$row['updated_at'],$row['deleted_at']);
        }

        return json_encode($feature);
    }



    public function save( Request $request ){

        $insert = locations::create([
            'province_id'   => $request->province_id,
            'district_id'   => $request->district_id,
            'category_id'   => $request->category_id,
            'name'          => $request->name,
            'address'       => $request->address,
            'date'          => $request->date,
            'note'          => $request->note,
        ]);

        $id = $insert->id;

        foreach ( $request->feature as $row ){
            $insert  = location_assets::create([
               'location_id'    => $id,
               'value'          => $row,
               'type'           => 'FEATURES',
            ]);
        }

        if($insert){
            return json_encode(['status' =>  'true' ]);
        }else {
            return json_encode(['status' =>  'false']);
        }
    }



}
