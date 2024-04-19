<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Publication;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function indexResto()
    {

        $Mainte = Service::with('user')->orderBy('created_at', 'desc')->get();

        $dataRes =  $Mainte->map(function ($items) {
            return [
                "id" => $items->id,
                "nom_service" => $items->nom_service,
                "type_service" => $items->type_service,
                "description" => $items->description,
                "tarifs" => $items->tarifs,
                "dispo" => $items->disponible,
                "image" => $items->image != null ? $items->imageUrl() : '',
                "user" => $items->user->username,
                "date" => $items->created_at,
            ];
        })->values();

        return  $dataRes;
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
            $dataPub = [
                "contenu" => $data['description'],
                "nb_like" => 0,
                "nb_commentaire" => 0,
                "image" => $data['image'],
                "id_service" => $main->id,
                "auteur" => auth()->user()->id,
            ];
            $pub = Publication::create($dataPub);
            return response()->json([
                'dataPub' => $pub,
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

    public function showPlat($id)
    {
        $plat = Service::with('user')->find($id);
        $plat['imageUrl'] = $plat->image == null ? '' : $plat->imageUrl();
        // $plat['image'] = $plat->image;
        return $plat;
    }

   
    public function updatePlatResto($id, ServiceRequest $request)
    {
        $data = $request->validated();
        $service = Service::findOrFail($id);
        $pub =  Publication::where('id_service',$id);

        if ($service->image != $request->image) {
            Storage::disk('public')->delete($service->image);
        }
        $image = $request->file('image');
        if ( $image && $request->hasFile('image')) {
            $img = $image->store('/ServiceImage', 'public');  
            $data['image'] = $img;
           
        }

        $resPub = $pub->update([
            "contenu" => $data['description'],
            "image" => $data['image'],
        ]);
        
        $res = $service->update($data);
        if ($res && $resPub) {  
            return response()->json([
                'status' => 'success',
                'new' => $service->fresh(),
                'message' => 'Service updated successfully',
            ]);
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
}
