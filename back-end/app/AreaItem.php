<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaItem extends Model
{
    protected $table = "area_item";

    public function items()
    {
        return $this->hasMany('App\FormulaItem');
    }

    public function area()
    {
        return $this->belongsTo('App\Area');
    }
}
