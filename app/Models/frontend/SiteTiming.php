<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;

class SiteTiming extends Model
{
    protected $table = 'site_timing';
    protected $primaryKey = 'id';

    protected $fillable = [
        'site_id',
        'day',
        'is_24_hours',
        'start_time',
        'end_time',
    ];
    protected $casts = [
        'is_24_hours' => 'boolean',
        'start_time' => 'datetime:H:i:s',
        'end_time' => 'datetime:H:i:s',
    ];
    public function site()
    {
        return $this->belongsTo(SitesModel::class, 'site_id');
    }

}
