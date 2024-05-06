<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaintenanceRequest;
use App\Models\Batiment;
use App\Models\Etudiant;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->status == 'enattend') {
            $Mainte = Maintenance::where('status', 'en attente')->with('user')->orderBy('created_at', 'desc')->get();
        } elseif ($request->status == 'encours') {
            $Mainte = Maintenance::where('status', 'en cours')->with('user')->orderBy('created_at', 'desc')->get();
        } elseif ($request->status == 'terminer') {
            $Mainte = Maintenance::where('status', 'terminer')->with('user')->orderBy('created_at', 'desc')->get();
        } else {
            $Mainte = Maintenance::with('user')->orderBy('created_at', 'desc')->get();
        }
     

        $dataRes =  $Mainte->map(function ($items) {
            $etudiant = Etudiant::with('logement')->find($items->user->id_etudiant);
            $batiment = Batiment::find($etudiant->logement->id_batiment);
            return [
                "id" => $items->id,
                "type" => $items->type_probleme,
                "design" => $items->description,
                "status" => $items->status,
                "image" =>  $items->image != null ? $items->imageUrl() : '',
                "user" => $items->user->username,
                "etudiant" => $etudiant->nom .' '. $etudiant->prenom,
                "logement" => $etudiant->logement->type_logement . ' N°: ' . $etudiant->logement->num_logement,
                "batiment" => $batiment->nom_batiment,
                "date" => $items->created_at,
            ];
        })->values();

        return  $dataRes;
    }

    public function demandeReparation(MaintenanceRequest $request)
    {
        $data = $request->validated();
        $image = $request->file('image');

        if ($request->hasFile('image')) {
            $data['image'] = $image->store('/Maintenance', 'public');
        }
        $main = Maintenance::create($data);
        if ($main) {
            return response()->json([
                'message' => 'Demande bien envoyer',
                'status' =>  true
            ]);
        } else {
            return response()->json([
                'message' => 'Failed..! Demande Non envoyer',
                'status' =>  false
            ]);
        }
    }

    public function updateReparation(Request $request)
    {
        if ($request->status == 'encours') {

            $main = Maintenance::find($request->id);
            $resLog = $main->update(["status" => 'en cours']);

            return response()->json([
                'message' => 'Reparation en cours',
                'status' =>  $resLog
            ]);
        } else {
            $main = Maintenance::find($request->id);
            $resLog = $main->update(["status" => 'terminer']);
            return response()->json([
                'message' => 'Reparation en Terminer',
                'status' =>  $resLog
            ]);
        }
    }


    public function countMaintenanceStatus()
    {
        $dataReserve = Maintenance::select('status')
            ->selectRaw('count(*) as nombre')
            ->groupby('status')->get();
        return $dataReserve;
    }
}
