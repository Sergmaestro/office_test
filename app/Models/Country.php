<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public const CACHE_KEY = 'countryList';
    public const CACHE_TAG = 'countries';
    public const CACHE_COUNTRY_KEY = 'countryData';

    protected $fillable = ['code', 'name', 'flag', 'is_member_eu', ];

}
