<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CallLog extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['number', 'shift', 'start_time', 'end_time', 'user_id', 'created_by'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
