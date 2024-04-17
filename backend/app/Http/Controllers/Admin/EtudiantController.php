<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtudiantRequest;
use App\Models\Etudiant;
use App\Models\Logement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiant = Etudiant::with('logement')->get();
        if ($etudiant) {
            return response()->json([
                'status' => 'success',
                'data' => $etudiant,
                'message' => 'Etudiant getter in successfully',
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Etudiant created failure',
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EtudiantRequest $request)
    {
        $validatedData = $request->validated();
        $dateNais = Carbon::parse($request->date_naissance);
        $validatedData['date_naissance'] = $dateNais;

        $chambre = Logement::find($request->id_logement);
        if ($chambre->status == 'libre') {
            $etudiant = Etudiant::create($validatedData);
            if ($etudiant) {
                $logement = $chambre->update([
                    'status' => 'occuper',
                ]);
                if ($logement) {
                    return response()->json([
                        'Logement' => $logement,
                        'status' => 'success',
                        'message' => 'Etudiant created successfully',
                    ]);
                } else {
                    return response()->json([
                        'status' => 'failed',
                        'message' => 'Etudiant created failure',
                    ]);
                }
            }
        }
        return response()->json([
            'status' => 'Annuler',
            'message' => 'Logement est n\'est pas disponible',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = Etudiant::with('logement')->find($id);
        if ($result) {
            return $result;
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Etudiant not found',
            ]);
        }
    }


    public function getEtudiantLogment(Request $request)
    {
        $result = Etudiant::where('id_logement', $request->id )->get();
        if ($result) {
            return $result;
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Etudiant not found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $etudiant = Etudiant::findOrFail($id);
        $res = $etudiant->update($request->all());
        if ($res) {
            return response()->json([
                'status' => 'success',
                'new' => $etudiant->fresh(),
                'message' => 'Etudiant updated successfully',
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $etudiant = Etudiant::find($id);
        $userDel =  $etudiant->delete();
        if ($userDel) {
            return response()->json([
                'status' => 'success',
                'message' => 'Etudiant delete successfully',
            ]);
        } else {
            return response()->json([
                'status' => 'Failure',
                'message' => 'Etudiant delete failed',
            ]);
        }
    }
}
