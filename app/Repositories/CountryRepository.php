<?php


namespace App\Repositories;


use App\Models\Country;
use Illuminate\Support\Facades\Cache;

class CountryRepository
{

    /**
     * @return mixed
     */
    public static function getAll(): array
    {
        return Cache::rememberForever(Country::CACHE_KEY, function() {
            return Country::all()->mapWithKeys(function ($item, $key) {
                return [$item['code'] => $item];
            })->toArray();
        });
    }

    /**
     * @return mixed
     */
    public function getAllForDropdown(): array
    {
        return array_map(function ($country) {
            $country['label'] = $country['name'];
            $country['value'] = $country['code'];

            return $country;
        }, self::getAll());
    }

    /**
     * @param string $countryCode
     * @return Country|null
     */
    public function getByCode(string $countryCode): ?array
    {
        return Cache::tags(Country::CACHE_TAG)->rememberForever(
            self::getCountryCacheKey($countryCode),
            function() use ($countryCode) {
                return self::getAll()[$countryCode] ?? null;
            }
        );
    }

    public function getById($countryId): ?array
    {
        foreach (self::getAll() as $country) {
            if ($country['id'] == $countryId) return $country;
        }

        return null;
    }

    /**
     * @param $countryCode
     * @return string
     */
    public static function getCountryCacheKey($countryCode): string
    {
        return Country::CACHE_COUNTRY_KEY . '_' . $countryCode;
    }

}
