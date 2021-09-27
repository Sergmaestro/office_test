<?php


namespace App\Http\Controllers;


use App\Http\Requests\OfficeRequest;
use App\Models\Office;
use App\Repositories\CountryRepository;
use App\Repositories\OfficeRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * @var officeRepository
     */
    private officeRepository $officeRepository;

    /**
     * OrganizationController constructor.
     * @param officeRepository $officeRepository
     */
    public function __construct(officeRepository $officeRepository)
    {
        $this->officeRepository = $officeRepository;
    }

    /**
     * @param Request $request
     * @return Application|Factory|JsonResponse|View
     */
    public function list(Request $request)
    {
        $isAjax = $request->ajax();
        $offices = $this->officeRepository->getListData($request);

        if ($isAjax) {
            return response()->json([
                'offices' => $offices->items() ? $offices : null,
                'noMore' => !$offices->hasMorePages()
            ]);
        }

        $noMore = !$offices->hasMorePages();

        return view('office.list', compact('offices', 'noMore'));
    }

    /**
     * @param $id
     * @param CountryRepository $countryRepository
     * @return Application|Factory|View
     */
    public function edit($id, CountryRepository $countryRepository)
    {
        if ($id) {
            $office = Office::findOrFail($id);
            $office->load('location');
        }

        return view('office.edit', [
            'office' => $office ?? (object) [
                'location' => (object) [
                    'country_id' => null,
                    'name' => null,
                ]
            ],
            'countries' => $countryRepository->getAllForDropdown()
        ]);
    }

    /**
     * @param OfficeRequest $request
     * @return JsonResponse
     */
    public function create(OfficeRequest $request) : JsonResponse
    {
        $location = $this->officeRepository->firstOrCreateLocation($request);
        $officeData = $request->only(['name', 'description', 'email']);
        $officeData['location_id'] = $location->id;

        $office = $this->officeRepository->create($officeData);

        return response()->json(['id' => $office->id]);
    }

    /**
     * @param Office $office
     * @param OfficeRequest $request
     * @return JsonResponse
     */
    public function update(
        Office $office,
        OfficeRequest $request
    ) : JsonResponse
    {
        $location = $this->officeRepository->firstOrCreateLocation($request);
        $officeData = $request->only(['name', 'description', 'slug', 'email',]);
        $officeData['location_id'] = $location->id;

        return response()->json(['organization' => $office->update($officeData)]);
    }
}
