<?php

namespace App\Http\Controllers\Admin;

use App\Events\ServiceNotif;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Commande;
use App\Models\Etudiant;
use App\Models\Logement;
use App\Models\Notification;
use App\Models\Publication;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ServiceController extends Controller
{
    public function indexResto(Request $request)
    {
        if ($request->type == 'resto') {
            $Mainte = Service::with('user')->where('type_service', 'RestoPlat')->orderBy('updated_at', 'desc')->get();
        } else {
            $Mainte = Service::with('user')->where('type_service', '!=', 'RestoPlat')->orderBy('updated_at', 'desc')->get();
        }
        $dataRes =  $Mainte->map(function ($items) {
            return [
                "id" => $items->id,
                "nom_service" => $items->nom_service,
                "type_service" => $items->type_service,
                "description" => $items->description,
                "tarifs" => $items->tarifs,
                "dispo" => $items->disponible,
                "image" => $items->image != null? $items->imageUrl() : '',
                "user" => $items->user->username,
                "date" => $items->updated_at,
            ];
        })->values();
        return  $dataRes;
    }

    public function indexCommande(Request $request)
    {
        if ($request->status == 'enattente') {
            $data = Commande::where('status', 'en attente')->with('user', 'service')->get();
        } else if ($request->status == 'annuler') {
            $data = Commande::where('status', 'annuler')->with('user', 'service')->get();
        } else if ($request->status == 'livrer') {
            $data = Commande::where('status', 'livré')->with('user', 'service')->get();
        } else {
            $data = Commande::with('user', 'service')->get();
        }

        $dataRes =  $data->map(function ($items) {
            $etudiant = Etudiant::with('logement')->find($items->user->id_etudiant);
            $logement = Logement::with('batiment')->find($etudiant->logement->id);
            return [
                "id" => $items->id,
                "nom_service" => $items->service->nom_service,
                "nombre" => $items->nombre,
                "description" => $items->service->description,
                "image" =>  $items->service->image != null ? $items->service->imageUrl() : '',
                "tele" => $etudiant->telephone,
                "status" => $items->status,
                "nom_etudaiant" => $etudiant->nom . ' ' . $etudiant->prenom,
                "logement" => $etudiant->logement->type_logement . ' ' . $etudiant->logement->num_logement,
                "batiment" => $logement->batiment->nom_batiment,
                "date" => $items->updated_at,
            ];
        })->values();
        return  $dataRes;
    }

    public function ajouterService(ServiceRequest $request)
    {
        $data = $request->validated();
        $image = $request->file('image');

        if ($request->hasFile('image')) {
            $data['image'] = $image->store('/ServiceImage', 'public');
        }

        $main = Service::create($data);
        if ($main) {
            return response()->json([
                'data' => $main,
                'message' => 'Enregistrer bien effectuer',
                'status' =>  true
            ]);
        } else {
            return response()->json([
                'message' => 'Failed..! Enregistrer echec',
                'status' =>  false
            ]);
        }
    }

    public function ajouterPlat(ServiceRequest $request)
    {
        $data = $request->validated();
        $image = $request->file('image');
        if ($request->hasFile('image')) {
            $data['image'] = $image->store('/ServiceImage', 'public');
        }
        $main = Service::create($data);
        if ($main) {
            $ser = Service::find($main->id);

            $Datanote = ["message" => json_encode($ser)];
            $resNot = Notification::create($Datanote);
            if ($resNot) {
                ServiceNotif::dispatch($resNot);
                $dataPub = [
                    "contenu" => $data['description'],
                    "nb_like" => 0,
                    "nb_commentaire" => 0,
                    "image" => $data['image'],
                    "id_service" => $main->id,
                    "auteur" => auth()->user()->id,
                ];
                $pub = Publication::create($dataPub);
                if ($pub) {
                    return response()->json([
                        'dataPub' => $pub,
                        'data' => $main,
                        'message' => 'Enregistrer bien effectuer',
                        'status' =>  true
                    ]);
                }
            }
        } else {
            return response()->json([
                'message' => 'Failed..! Enregistrer echec',
                'status' =>  false
            ]);
        }
    }

    public function showPlat($id)
    {
        $plat = Service::with('user')->find($id);
        $plat['imageUrl'] = $plat->image == null ? '' : $plat->imageUrl();
        return $plat;
    }


    public function updatePlatResto($id, ServiceRequest $request)
    {
        $data = $request->validated();
        $service = Service::findOrFail($id);

        $pub =  Publication::where('id_service', $id);

        if ($service->image != $request->image) {
            Storage::disk('public')->delete($service->image);
        }

        $image = $request->file('image');
        if ($image && $request->hasFile('image')) {
            $img = $image->store('/ServiceImage', 'public');
            $data['image'] = $img;
        }

        if ($request->type_service == 'RestoPlat') {
            $resPub = $pub->update([
                "contenu" => $data['description'],
                "image" => $data['image'],
            ]);
        }
        $Notif = Notification::where('message', json_encode($service))->first();
        $res = $service->update($data);
        if ($Notif) {
            $resNot =  $Notif->update(["message" => json_encode($service->fresh())]);
            if ($res && $resNot){
                return response()->json([
                    'status' => 'success',
                    'new' => $service->fresh(),
                    'message' => 'Service updated successfully',
                ]);
            }
            else{ 
                return response()->json([
                'status' => 'Failder',
                '$Notif' => $service,
            ]);
            }
        }
    }

    public function deleteService($id)
    {
        $service = Service::findOrFail($id);

        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        $res = $service->delete();
        if ($res) {
            return response()->json([
                'status' => 'success',
                'new' => $service->fresh(),
                'message' => 'Service deleted in successfully',
            ]);
        }
    }

    public function countStatus()
    {
        $data = Commande::select('status')
            ->selectRaw('count(*) as nombre')
            ->groupby('status')->get();
        return $data;
    }
}
