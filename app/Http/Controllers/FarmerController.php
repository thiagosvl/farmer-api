<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\FarmerService;
use App\Http\Requests\FarmerCreateRequest;
use App\Http\Requests\FarmerUpdateRequest;
use App\Http\Resources\FarmerResource;
use App\Models\Farmer;
use App\Exceptions\FarmerNotfoundException;

class FarmerController extends Controller
{

    protected $service;

    public function __construct(FarmerService $farmerService)
    {
        $this->service = $farmerService;
    }

    /**
     * Display a listing of farmers.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $farmers = $this->service->all();
        return FarmerResource::collection($farmers);
    }

    /**
     * Store a newly created farmer in the database.
     *
     * @param  FarmerCreateRequest  $request
     * @return FarmerResource
     */
    public function store(FarmerCreateRequest $request)
    {
        $data = $request->validated();
        $farmer = $this->service->create($data);

        return new FarmerResource($farmer);
    }

     /**
     * Display the specified farmer.
     *
     * @param  int  $id
     * @return FarmerResource
     *
     * @throws FarmerNotfoundException
     */
    public function show($id)
    {
        $farmer = $this->service->find($id);
     
        if (!$farmer) {
            throw new FarmerNotFoundException();
        }

        return new FarmerResource($farmer);
    }

    /**
     * Update the specified farmer in the database.
     *
     * @param  Farmer  $farmer
     * @param  FarmerUpdateRequest  $request
     * @return FarmerResource
     */
    public function update(Farmer $farmer, FarmerUpdateRequest $request)
    {
        $data = $request->validated();
        $farmer = $this->service->update($farmer, $data);

        return new FarmerResource($farmer);
    }

    /**
     * Remove the specified farmer from the database.
     *
     * @param  Farmer  $farmer
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Farmer $farmer)
    {
        if($this->service->delete($farmer)){
            return response()->json(['message' => 'Farmer deleted successfully'], 200);
        }
        
        return response()->json(['message' => 'Failed to delete the farmer'], 500);
    }
}
