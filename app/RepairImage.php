<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RepairImage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'repair_id', 'filenames'
    ];

    public function repair()
    {
        return $this->belongsTo('App\Repair', 'repair_id');
    }
}
