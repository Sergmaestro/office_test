<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    public const PER_PAGE = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'location_id', 'name', 'description', 'email', 'slug'
    ];


}
