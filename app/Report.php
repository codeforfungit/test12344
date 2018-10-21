<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function column(){

        return $this->belongsToMany(Column::class,'report_columns','report_id','column_id')
            ->withPivot('column_alias', 'order_hierarchy','auto_hide');
    }
}
