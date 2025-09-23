<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmergencyCase extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['reporting_time', 'reporting_date', 'agency_id', 'region_id', 'location', 'contact', 'description', 'action_taken', 'feedback', 'user_id', 'created_by'];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function agency(): BelongsTo
    {
        return $this->belongsTo(Agency::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
