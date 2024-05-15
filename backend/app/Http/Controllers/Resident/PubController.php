<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublicationRequest;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PubController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }
    //
    public function index(Request $request)
    {
        if ($request->params == 'user') {
            $Mainte = Publication::with('auteurPub', 'service')->where('auteur', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        } else {

            $Mainte = Publication::with('auteurPub', 'service')->orderBy('created_at', 'desc')->get();
        }
        return  $this->resultat($Mainte);
    }

    public function addPublication(PublicationRequest $request)
    {
        $data = $request->validated();
        $image = $request->file('image');
        if ($request->hasFile('image')) {
            $data['image'] = $image->store('/Pub/User-'.auth()->user()->id , 'public');
        }

        $pubCreate = Publication::create($data);
        if ($pubCreate) {
            return response()->json([
                'data' => $pubCreate,
                'message' => 'Enregistrer bien effectuer',
                'status' =>  true
            ]);
        }
    }

    public function showOnePub($id)
    {
        $Pub = Publication::with('auteurPub', 'service')->orderBy('created_at', 'desc')->find($id);
        $Pub['pdp'] = $Pub->auteurPub->imageUrl() ?? '';
        $Pub['auteur'] = $Pub->auteurPub->username;
        $Pub['image'] = $Pub->imageUrl() ?? '';

        return $Pub;
    }

    public function resultat($data)
    {
        $donnee =  $data->map(function ($items) {
            return [
                "id" => $items->id,
                "contenu" => $items->contenu,
                "nb_like" => $items->nb_like,
                "nb_commentaire" => $items->nb_commentaire,
                "image" => $items->image != null ? $items->imageUrl() : '',
                "service" => $items->service,
                "pdp" => $items->auteurPub->imageUrl(),
                "auteur" => $items->auteurPub,
                "date" => $items->updated_at,
            ];
        })->values();

        return $donnee;
    }
}
