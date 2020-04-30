<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormulaItem extends Model
{
    protected $table = "formula_item";

    public function areaitem()
    {
        return $this->belongsTo('App\AreaItem');
    }
}
