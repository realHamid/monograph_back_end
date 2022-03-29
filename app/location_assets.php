<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class location_assets extends Model
{
    //



    use SoftDeletes;



//    region type

    CONST FEATURES = 'FEATURES';
    CONST GALLERY   = 'GALLERY';

    CONST TYPE_STATUS = [self::FEATURES,self::GALLERY];

//    end region type



//    region props
    protected $fillable = ['location_id','value','type'];
//    end region props



}
