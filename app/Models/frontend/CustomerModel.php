<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerModel extends Authenticatable
{
    use HasFactory;

    protected $table = "customers";
    protected $primaryKey = "id";

    protected $fillable = [
        'full_name', 'email', 'password','raw_password', 'phone_number', 'address', 'company_name',
        'city', 'state', 'zip_code', 'country', 'is_active', 'profile_image',
    ];

    protected $hidden = [
        'password',
    ];

    public function sites():HasMany
    {
        return $this->hasMany(SitesModel::class, 'customer_id');
    }

    public function notifications():HasMany
    {
        return $this->hasMany(NotificationsModel::class, 'customer_id');
    }
}
