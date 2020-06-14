<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Repair extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'equipment_id', 'repair_detail', 'repair_etc', 'user_id', 'repair_active',
        'repair_status', 'filenames'
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
