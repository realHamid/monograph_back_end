<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class categories extends Model
{
    //

    use SoftDeletes;


    //    region props
    protected $fillable = ['name','date','note'];
//    end region props


}
