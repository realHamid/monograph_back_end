<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class locations extends Model
{
    //

    use SoftDeletes;


//    region props
    protected $fillable = [
        'province_id','district_id','category_id',
        'name','image','date','note','address'
    ];
//    end region props


//   region relation

    public function province()
    {
       return $this->belongsTo('App\provinces','province_id');
    }

    public function district()
    {
        return $this->belongsTo('App\districts','district_id');
    }

    public function category()
    {
        return $this->belongsTo('App\categories','category_id');
    }

//  end region relation


}
