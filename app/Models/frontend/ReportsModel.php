<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReportsModel extends Model
{
    protected $table = "reports";
    protected $primaryKey = "id";
    protected $fillable = ['site_id', 'report_date', 'report_type', 'description', 'status', 'report_image' , 'token'];

    public function site(): BelongsTo
    {
        return $this->belongsTo(SitesModel::class, 'site_id');
    }
}
