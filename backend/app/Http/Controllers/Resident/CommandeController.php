<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommandeRequest;
use App\Models\Batiment;
use App\Models\Commande;
use App\Models\Etudiant;
use App\Models\Logement;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class CommandeController extends Controller
{

    public function index()
    {

        $Mainte = Service::with('user')->orderBy('updated_at', 'desc')->get();
        $dataRes =  $Mainte->map(function ($items) {
            return [
                "id" => $items->id,
                "nom_service" => $items->nom_service,
                "type_service" => $items->type_service,
                "description" => $items->description,
                "tarifs" => $items->tarifs,
                "disponible" => $items->disponible,
                "image" => $items->image != null ? $items->imageUrl() : '',
                "user" => $items->user->username,
                "date" => $items->created_at,
            ];
        })->values();

        return  $dataRes;
    }

    public function commandeUser(){
        $id = auth()->user()->id;
        $data = Commande::with('user','service')->where('id_user', $id)->get();
        
        return $data->map(function ($items) {
            return [
                "id" => $items->id,
                "nom_service" => $items->service->nom_service,
                "type_service" => $items->service->type_service,
                "description" => $items->service->description,
                "tarifs" => $items->service->tarifs,
                "status" => $items->status,
                "nombre" => $items->nombre,
                "image" => $items->service->image != null ? $items->service->imageUrl() : '',
                "user" => $items->user->username,
                "date" => $items->updated_at,
            ];
        })->values();
;
    }

    public function demandeService(CommandeRequest $request)
    {
        $data = $request->validated();
        $service = Service::find($request->id_service);
        if (!$service->disponible) {
            return response()->json([
                'message' => 'Failed..! Service non disponible',
                'status' =>  false
            ]);
        }
        $main = Commande::create($data);
        if ($main) {
            return response()->json([
                'message' => 'Commande bien envoyer',
                'status' =>  true
            ]);
        } else {
            return response()->json([
                'message' => 'Failed..! Commande Non envoyer',
                'status' =>  false
            ]);
        }
    }
}
