<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function emergencyCase(): HasMany
    {
        return $this->hasMany(emergencyCase::class);
    }
}
