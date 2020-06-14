<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriesList extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'list_title', 'categories_id', 'list_price_per_unit', 'list_get', 'list_fiscalyear', 'list_status'
    ];

    public function categories()
    {
        return $this->belongsTo('App\Categories', 'categories_id');
    }
}
