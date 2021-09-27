<?php


namespace App\Repositories;


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
        return Office::simplePaginate(Office::PER_PAGE);
    }

    /**
     * @param array $data
     * @return Office
     */
    public function create(array $data) : Office
    {
        return Office::create($data);
    }
}
