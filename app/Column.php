<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    protected $table='columns';

    public  function reportColumn(){

        return $this->belongsToMany(Report::class,'report_columns','column_id','id');
    }
}
