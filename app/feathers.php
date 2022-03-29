<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class feathers extends Model
{

    use SoftDeletes;


//    region props
    protected $fillable = ['name','img','date','note'];
//    end region props


}
