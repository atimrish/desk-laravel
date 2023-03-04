<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeskListStoreRequest;
use App\Http\Resources\DeskListResource;
use App\Models\DeskList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class DeskListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return DeskListResource::collection(DeskList::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DeskListStoreRequest $request
     * @return Response
     */
    public function store(DeskListStoreRequest $request)
    {
        return DeskList::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param DeskList $deskList
     * @return DeskListResource
     */
    public function show(DeskList $deskList)
    {
        return new DeskListResource($deskList);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DeskListStoreRequest $request
     * @param DeskList $deskList
     * @return DeskListResource
     */
    public function update(DeskListStoreRequest $request, DeskList $deskList)
    {
        $deskList->update($request->validated());
        return new DeskListResource($deskList);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeskList $deskList
     * @return Response
     */
    public function destroy(DeskList $deskList)
    {
        $deskList->delete();
        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
