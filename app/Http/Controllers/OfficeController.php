<?php


namespace App\Http\Controllers;


use App\Http\Requests\OfficeRequest;
use App\Models\Office;
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
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        if ($id) {
            $organization = Office::findOrFail($id);
        }

        return view('office.edit', [
            'office' => $organization ?? (object) []
        ]);
    }

    /**
     * @param OfficeRequest $request
     * @return JsonResponse
     */
    public function create(OfficeRequest $request) : JsonResponse
    {
        $organizationData = $request->only(['name', 'description', 'email', 'tmpFile']);
        $office = $this->officeRepository->create($organizationData);

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
        $officeData = $request->only(['name', 'description', 'slug', 'email', 'tmpFile']);

        return response()->json(['organization' => $office->update($officeData)]);
    }
}
