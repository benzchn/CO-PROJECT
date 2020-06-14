<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rent extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'equipment_id', 'rent_status', 'rent_etc', 'rent_report_date',
        'rent_date', 'rent_return_date_fix', 'rent_return_date'
    ];

    public function equipment()
    {
        return $this->belongsTo('App\Equipment', 'equipment_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
