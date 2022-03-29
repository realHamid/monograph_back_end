<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class districts extends Model
{
    //
    use SoftDeletes;



//    region props
    protected $fillable =['province_id','name','date','note','img'];

    //    end region props


//   region relation

    public function districts(){
        return $this->belongsTo(provinces::class);
    }

//   end region relation

}
