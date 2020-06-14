<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'equipment_code', 'equipment_image', 'equipment_image_64', 'equipment_name',
        'equipment_location', 'equipment_role', 'equipment_etc', 'list_id', 'equipment_active',
        'equipment_status'
    ];

    public function list()
    {
        return $this->belongsTo('App\CategoriesList', 'list_id');
    }
}
