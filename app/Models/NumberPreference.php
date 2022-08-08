<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class NumberPreference extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'value',
    ];

    /**
     * Get the number that owns the NumberPreference
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function number(): BelongsTo
    {
        return $this->belongsTo(Number::class);
    }
}
