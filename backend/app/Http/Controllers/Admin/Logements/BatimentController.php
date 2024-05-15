<?php

namespace App\Http\Controllers\Admin\Logements;

use App\Http\Controllers\Controller;
use App\Http\Requests\BatimentRequest;
use App\Models\Batiment;
use Illuminate\Http\Request;

class BatimentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BatimentRequest $request)
    {
        $batiment = Batiment::create($request->validated());
        if ($batiment){
            return response()->json([
                'Batiment'=>$batiment,
                'status' => 'success',
                'message' => 'Batiment created successfully',
            ]);
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'Batiment created failure',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
