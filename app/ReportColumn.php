<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportColumn extends Model
{
    protected $table='report_columns';

    public function column(){

        return $this->belongsToMany(Column::class,'report_columns','column_id','id');
        return $this->belongsToMany(Column::class,'report_columns','id','column_id')
            ->withPivot('column_alias', 'order_hierarchy','auto_hide');
    }
}
