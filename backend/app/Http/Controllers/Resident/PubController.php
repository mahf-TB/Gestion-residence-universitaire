<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;

class PubController extends Controller
{
    //
    public function index()
    {

        $Mainte = Publication::with('auteurPub')->with('service')->orderBy('created_at', 'desc')->get();
        $dataRes =  $Mainte->map(function ($items) {
            return [
                "id" => $items->id,
                "contenu" => $items->contenu,
                "nb_like" => $items->nb_like,
                "nb_commentaire" => $items->nb_commentaire,
                "image" => $items->image != null ? $items->imageUrl() : '',
                "service" => $items->service,
                "auteur" => $items->auteurPub,
                "date" => $items->updated_at,
            ];
        })->values();
      
        return  $dataRes;
    }
}
