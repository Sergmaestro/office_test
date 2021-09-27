<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Office extends ModelSluggable
{
    public const PER_PAGE = 10;
    public const SLUG_SOURCE = 'name';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'location_id', 'name', 'description', 'email', 'slug'
    ];

    /**
     * @return BelongsTo
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

}
