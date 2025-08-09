<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NotificationsModel extends Model
{
    protected $table = "notifications";
    protected $primaryKey = "id";

    protected $fillable = ['customer_id', 'notification_type', 'message', 'notification_date', 'status'];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(CustomerModel::class, 'customer_id');
    }
}
