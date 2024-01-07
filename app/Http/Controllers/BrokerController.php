<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrokerRequest;
use App\Http\Resources\BrokersResource;
use App\Models\Broker;
use Illuminate\Http\Request;

class BrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BrokersResource::collection(Broker::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrokerRequest $request)
    {
        $request->validated();

        $broker = Broker::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'logo_path' => $request->logo_path,
        ]);

        return new BrokersResource($broker);
    }

    /**
     * Display the specified resource.
     */
    public function show(Broker $broker)
    {
        return new BrokersResource($broker);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Broker $broker)
    {
        $broker->update($request->only([
            'name',
            'address',
            'phone_number',
            'city',
            'zip_code',
            'logo_path',
        ]));
        return new BrokersResource($broker);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Broker $broker)
    {
        $broker->delete();

        return response()->json([
            'success' => true,
            'message' => 'Broker deleted successfully',
        ]);
    }
}