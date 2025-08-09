<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    protected $table = "site_emergency_contacts";
    protected $primaryKey = "id";
    protected $fillable = [
        'site_id', 'name', 'phone', 'designation', 'email', 'emergency_phone', 'address',
    ];
    public function site()
    {
        return $this->belongsTo(SitesModel::class);
    }

}
