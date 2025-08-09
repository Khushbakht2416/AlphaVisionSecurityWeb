<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SitesModel extends Model
{
    protected $table = "sites";
    protected $primaryKey = "id";
    protected $fillable = [
        'customer_id', 'name', 'type', 'address', 'longitude', 'latitude', 'description', 'emergency_protocol',
        'no_of_cameras', 'camera_software', 'software_credentials',
        'days', 'start_time', 'end_time', 'status', 'token',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(CustomerModel::class);
    }

    public function reports():HasMany
    {
        return $this->hasMany(ReportsModel::class, 'site_id');
    }

    public function emergencyContacts(): HasMany
    {
        return $this->hasMany(EmergencyContact::class, 'site_id');
    }

    public function timings(): HasMany
    {
        return $this->hasMany(SiteTiming::class, 'site_id');
    }

}
