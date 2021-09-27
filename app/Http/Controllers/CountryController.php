<?php


namespace App\Http\Controllers;


use App\Repositories\CountryRepository;
use Illuminate\Http\JsonResponse;

class CountryController extends Controller
{
    /**
     * @var CountryRepository
     */
    protected CountryRepository $countryRepository;

    /**
     * CountryController constructor.
     * @param CountryRepository $countryRepository
     */
    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    /**
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        return response()->json(['countries' => $this->countryRepository->getAllForDropdown() ]);
    }

}
