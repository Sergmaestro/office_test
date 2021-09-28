<?php


namespace App\Repositories;


use App\Models\Location;
use App\Models\Office;
use Illuminate\Http\Request;

class OfficeRepository
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function getListData(Request $request)
    {
        return Office::with([
            'location:id,country_id,name',
            'location.country:id,name'
        ])->simplePaginate(Office::PER_PAGE);
    }

    /**
     * @param array $data
     * @return Office
     */
    public function create(array $data) : Office
    {
        return Office::create($data);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function firstOrCreateLocation($request)
    {
        return Location::firstOrCreate([
            'country_id' => $request->location['country_id'] ?? null,
            'name' => trim($request->location['name'] ?? '')
        ]);
    }
}
