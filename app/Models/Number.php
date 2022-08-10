<?php

namespace App\Models;

use App\Helpers\NumberStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Number extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'number',
        'status',
    ];

    protected $appends = [
        'statusLabel',
    ];

    /**
     * Get the customer that owns the Number
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get all of the preferences for the Number
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preferences(): HasMany
    {
        return $this->hasMany(NumberPreference::class);
    }

    public function getStatusLabelAttribute()
    {
        return NumberStatus::getLabel($this->status);
    }
}
