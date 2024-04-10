<?php

namespace App\Http\Controllers\Admin\Logements;

use App\Http\Controllers\Controller;
use App\Http\Requests\BatimentRequest;
use App\Http\Requests\LogementRequest;
use App\Models\Logement;
use Illuminate\Http\Request;

class LogementController extends Controller
{

    public function index()
    {
        return Logement::with('batiment')->get();
    }
    public function getTypeLogement()
    {
        $type = Logement::select('type_logement')->distinct()->get();
        // dd();
         return response()->json([
            'status' => 'success',
            'dataType' => $type,
        ]);
    }
    public function getLogement(Request $request)
    {
        $type = $request->type_logement;
        $logement = Logement::where('type_logement', $type )->where('status', 'libre')->get();
        // dd();
         return response()->json([
            'status' => 'success',
            'logement' => $logement,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(LogementRequest $request)
    {
        $logement = Logement::create($request->validated());
        if ($logement){
            return response()->json([
                'status' => 'success',
                'message' => 'Logement created successfully...',
            ]);
            
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'Logement created failure...',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return Logement::where('status', 'libre')->with('batiment')->find($id);
        return Logement::with('batiment')->find($id);
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
