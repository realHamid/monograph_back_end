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
       return $this->belongsTo(provinces::class);
    }

    public function district()
    {
        return $this->belongsTo(districts::class);
    }

    public function category()
    {
        return $this->belongsTo(categories::class);
    }

//  end region relation


}
